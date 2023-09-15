<?php

namespace App\Models;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
	use HasFactory;

	protected $fillable = ['email', 'product_id'];

	/** 
	 * Метод-scope расширяет запрос (ч.25: Observer)
	 */
	public function scopeActiveByProductId($query, $productId)
	{
		return $query->where('status', 0)->where('product_id', $productId);
	}

	/** 
	 * Метод реализует связь подписки с продуктом (ч.25: Observer)
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	/** 
	 * Метод выберет все подписки, которые были у пользователя, отправит пользователю email и обновит в подписках status = 1 
	 * (ч.25: Observer)
	 */
	public static function sendEmailBySubscription(Product $product)
	{
		// получим все подписки удовлетворяющие условию описанному в public function scopeActiveByProductId($query, $productId)
		$subscriptions = self::activeByProductId($product->id)->get();

		// пробежимся по каждой подписке, отправим сообщения, изменим статус:
		foreach ($subscriptions as $subscription) {

			Mail::to($subscription->email)->send(new SendSubscriptionMessage($product));

			$subscription->status = 1;

			$subscription->save();
		}
	}
}
