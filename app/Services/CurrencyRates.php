<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

// Laravel: интернет магазин ч.29: Запросы к внешнему сервису, Guzzle (обновление ставок валют)

class CurrencyRates
{
	/** 
	 * Метод будет обновлять валюту по актуальному курсу используя пакет: https://docs.guzzlephp.org/ обращаясь к сервису получения ставок для валют: https://exchangeratesapi.io 
	 */
	public static function getRates()
	{
		$baseCurrency = CurrencyConversion::getBaseCurrency();

		$url = config('currency_rates.api_url') . '?base=' . $baseCurrency->code;

		$client = new Client();

		$response = $client->request('GET', $url);

		if ($response->getStatusCode() !== 200) {

			throw new Exception('There is a problem with currency rate service');
		}

		// получили ответ со актуальными ставками валют на текущее время от сервиса валют, указанного выше
		// раскодировали json-строку и представили в виде массива, указав 2-ым параметром: true
		// всего массива берём только то, что хранится в его ячейке: ['rates']
		$rates = json_decode($response->getBody()->getContents(), true)['rates'];

		// проходим по всем валютам
		foreach (CurrencyConversion::getCurrencies() as $currency) {

			if (!$currency->isMain()) {

				// если в ответе сервиса валют не задана указанная на сайте валюта 
				if (!isset($rates[$currency->code])) {

					throw new Exception('There is a problem with currency ' . $currency->code);
				} else {

					// обновим имеющиеся на сайте ставки валют на актуальные
					$currency->update(['rate' => $rates[$currency->code]]);
					// в момент сохранения ставок вызовем метод, которфй принудительно обновит ставки в БД
					$currency->touch();
				}
			}
		}
	}
}
