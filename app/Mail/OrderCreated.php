<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// ч.24: Отправка Email
class OrderCreated extends Mailable
{
	use Queueable, SerializesModels;

	protected $name;
	protected $order;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($name, Order $order)
	{
		$this->name = $name;
		$this->order = $order;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		//$fullSum = $this->order->calculateFullSum();
		// +ч.30: Collection, Объект Eloquent без сохранения
		$fullSum = $this->order->getFullSum();

		return $this->view('mail.order_created', ['name' => $this->name, 'fullSum' => $fullSum, 'order' => $this->order]);
	}
}
