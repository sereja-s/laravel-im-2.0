<?php

namespace App\ViewComposers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\View\View;

// Laravel: интернет магазин ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups)

/** 
 * Класс добавляет самые популярные товары (по кол-ву покупок)
 */
class BestProductsComposer
{
	public function compose(View $view)
	{
		// (+ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups))
		// получим самые популярные продукты по связи с заказами:

		// Mетод map используем как свойство (здесь он пройдёт по каждому элементу коллекции с заказами и вызовет продукты для
		//  каждого заказа и всё это вернёт в коллекцию)

		// Метод flatten объединяет многомерную коллекцию в одноуровневую

		// (чтобы попасть к записи в связанной(третьей) таблице из коллекции необходимо снова использовать метод: map как свойство)

		// Метод mapToGroups группирует элементы коллекции по указанному замыканию. Замыкание должно возвращать ассоциативный 
		// массив, содержащий одну пару ключ / значение, таким образом формируя новую коллекцию сгруппированных значений
		// (здесь обрабатываем каждую запись связующей таблицы)

		// затем получим суммарное количество покупок для каждого товара в заказах

		// В конце сортируем коллекцию, берём три самых продаваемых продукта, получим их ключи и положим в массив
		$bestSkuIds = Order::get()->map->skus->flatten()->map->pivot->mapToGroups(function ($pivot) {

			// по id продукта получим сколько этого продукта было куплено
			return [$pivot->sku_id => $pivot->count];
			// получим сумму из имеющйся внутри коллекции(здесь- количество каждого купленного товара, имеющихся в заказах)
		})->map->sum()->sortByDesc(null)->take(3)->keys()->toArray();

		$bestSkus = Sku::whereIn('id', $bestSkuIds)->get();

		/* $bestSkus = Sku::with('orders')
			->get()->map->orders->flatten()->map->pivot->mapToGroups(function ($pivot) {
				return [$pivot->sku_id => $pivot->count];
			})->map->sum()->sortDesc()->take(3)->keys()->collect()
			->map(function ($value) {
				return (Sku::query()->where('id', $value)->get());
			})->flatten(); */

		$view->with('bestSkus', $bestSkus);
	}
}
