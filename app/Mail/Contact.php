<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->contact = $data;
        $this->contact['name_adm'] = env('APP_NAME');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->contact['email'], $this->contact['name'])
                    ->subject('Mensagem enviada com sucesso!')
                    ->view('email.contact')
                    ->with([
                        'contact' => $this->contact,
                    ]);
    }
}
