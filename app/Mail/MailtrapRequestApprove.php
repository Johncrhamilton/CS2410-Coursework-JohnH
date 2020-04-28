<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailtrapRequestApprove extends Mailable
{
  use Queueable, SerializesModels;

  public $user_name;

  /**
  * Create a new message instance.
  *
  * @param string $user_name
  * @return void
  */
  public function __construct($user_name)
  {
    $this->user_name = $user_name;
  }

  /**
  * Build the message.
  *
  * @return $this
  */
  public function build()
  {
    return $this->from('findthelost.system@gmail.com', 'Find The Lost System')
    ->subject('Request Confirmation')
    ->markdown('mails.itemRequestApprove')
    ->with([
      'name' => $this->user_name,
    ]);
  }
}
