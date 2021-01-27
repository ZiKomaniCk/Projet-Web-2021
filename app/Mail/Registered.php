<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registered extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // , ['store_name' => $store_name]
        // $this->contact['store_name'] = 'EKIP';
        return $this->view('mails.registered', $this->contact);
    }
}
