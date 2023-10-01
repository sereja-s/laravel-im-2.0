<?php

namespace App\Services;

use App\Models\Currency;
use Carbon\Carbon;

// ч.28: Мультивалюта

class CurrencyConversion
{
	public const DEFAULT_CURRENCY_CODE = 'RUB';

	/** 
	 * переменная для хранения всех доступных валют
	 */
	protected static $container;

	/** 
	 * Метод загрузит контейнер если его нет В контейнере будут лежать все валюты по их коду
	 */
	public static function loadContainer()
	{
		if (is_null(self::$container)) {

			$currencies = Currency::get();

			foreach ($currencies as $currency) {

				self::$container[$currency->code] = $currency;
			}
		}
	}

	/** 
	 * Метод вернёт все доступные валюты
	 */
	public static function getCurrencies()
	{
		// +ч.29: Запросы к внешнему сервису, Guzzle
		self::loadContainer();

		return self::$container;
	}

	/** 
	 * Метод из сессии возвращает код нужной нам валюты
	 * (ч.30: Collection, Объект Eloquent без сохранения)
	 */
	public static function getCurrencyFromSession()
	{
		return session('currency', self::DEFAULT_CURRENCY_CODE);
	}

	/** 
	 * Метод из сессии достаёт id(объект) нужной нам валюты
	 * (+ч.30: Collection, Объект Eloquent без сохранения)
	 */
	public static function getCurrentCurrencyFromSession()
	{
		self::loadContainer();

		$currencyCode = self::getCurrencyFromSession();

		foreach (self::$container as $currency) {

			// если код в объекте равняется коду из сессии
			if ($currency->code === $currencyCode) {

				return $currency;
			}
		}
	}

	/** 
	 * Метод конвертирует цены в выбранной валюте
	 * (на вход: 1- что конвертируем 2- все продукты изначально заданы в рублях 3-выбранное значение валюты)
	 */
	public static function convert($sum, $originCurrencyCode = self::DEFAULT_CURRENCY_CODE, $targetCurrencyCode = null)
	{
		self::loadContainer();

		$originCurrency = self::$container[$originCurrencyCode];

		// +Laravel: интернет магазин ч.30: Collection, Объект Eloquent без сохранения
		// проверим когда производилось обновление ставок валют и надо ли его производить снова
		// по условию: не обновлять валюту если она дефолтная (Laravel: интернет магазин ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups))
		if ($originCurrency->code != self::DEFAULT_CURRENCY_CODE) {

			// ч.29: Запросы к внешнему сервису, Guzzle
			if ($originCurrency->rate != 0 || $originCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()) {
				CurrencyRates::getRates();
				self::loadContainer();
				$originCurrency = self::$container[$originCurrencyCode];
			}
		}

		if (is_null($targetCurrencyCode)) {

			// +ч.30: Collection, Объект Eloquent без сохранения
			$targetCurrencyCode = self::getCurrencyFromSession();
		}

		$targetCurrency = self::$container[$targetCurrencyCode];

		// по условию: не обновлять валюту если она дефолтная (Laravel: интернет магазин ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups))
		if ($originCurrency->code != self::DEFAULT_CURRENCY_CODE) {

			if ($targetCurrency->rate == 0 || $targetCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()) {
				CurrencyRates::getRates();
				self::loadContainer();
				$targetCurrency = self::$container[$targetCurrencyCode];
			}
		}

		return $sum / $originCurrency->rate * $targetCurrency->rate;
	}

	/** 
	 * Метод вернёт символ выбранной валюты
	 */
	public static function getCurrencySymbol()
	{
		self::loadContainer();

		// +ч.30: Collection, Объект Eloquent без сохранения
		$currencyFromSession = self::getCurrencyFromSession();

		$currency = self::$container[$currencyFromSession];

		return $currency->symbol;
	}

	/** 
	 * Метод вернёт код базовой валюты
	 * (ч.29: Запросы к внешнему сервису, Guzzle)
	 */
	public static function getBaseCurrency()
	{
		self::loadContainer();

		foreach (self::$container as $code => $currency) {

			// isMain()- метод соответствующей модели (проверяет является ли валюта базовой)
			if ($currency->isMain()) {

				return $currency;
			}
		}
	}
}
