<?php

namespace App\Models;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
	use HasFactory;

	// +ч.35: Eloquent: whereHas
	protected $fillable = ['email', 'sku_id'];

	/** 
	 * Метод-scope расширяет запрос (ч.25: Observer)
	 */
	public function scopeActiveBySkuId($query, $skuId)
	{
		return $query->where('status', 0)->where('sku_id', $skuId);
	}

	/** 
	 * Метод реализует связь подписки с продуктом (ч.25: Observer. ч.35: Eloquent: whereHas)
	 */
	public function sku()
	{
		return $this->belongsTo(Sku::class);
	}

	/** 
	 * Метод выберет все подписки, которые были у пользователя, отправит пользователю email и обновит в подписках status = 1 
	 * (ч.25: Observer,ч.35: Eloquent: whereHas)
	 */
	public static function sendEmailBySubscription(Sku $sku)
	{
		// получим все подписки удовлетворяющие условию описанному в public function scopeActiveBySkuId($query, $productId)
		$subscriptions = self::activeBySkuId($sku->id)->get();

		// пробежимся по каждой подписке, отправим сообщения, изменим статус:
		foreach ($subscriptions as $subscription) {

			Mail::to($subscription->email)->send(new SendSubscriptionMessage($sku));

			$subscription->status = 1;

			$subscription->save();
		}
	}
}
