<?php

namespace App\Observers;

use App\Models\Product;

use App\Models\Subscription;

//ч.25: Observer (подписка на отсутствующий товар)

class ProductObserver
{
	/**
	 * Метод сработает, во время того как продукт будет обновлён (здесь- его количество)
	 */
	public function updating(Product $product)
	{
		// в переменную сохраним кол-во товара до того как в карточке товара (в админке) внесли изменения
		$oldCount = $product->getOriginal('count');

		if ($oldCount == 0 && $product->count > 0) {

			Subscription::sendEmailBySubscription($product);
		}
	}
}
