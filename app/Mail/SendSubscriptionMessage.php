<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\Sku;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSubscriptionMessage extends Mailable
{
	use Queueable, SerializesModels;

	protected $sku;

	/**
	 * Create a new message instance.
	 * 
	 * (+ч.35: Eloquent: whereHas)
	 *
	 * @return void
	 */
	public function __construct(Sku $sku)
	{
		$this->sku = $sku;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->view('mail.subscription', ['sku' => $this->sku]);
	}
}
