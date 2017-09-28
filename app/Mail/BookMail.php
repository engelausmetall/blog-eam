<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$path,$title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    //public function __construct()
    public function __construct($user,$path,$title)
    {
        //
        $this->user=$user;
        $this->path=$path;
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    //Defino a quien envio el email
    public function build()
    {
        //return $this->markdown('emails.books');
        $this->subject('Crearon un libro');
        /*Una forma de agregar destinatario
        //$this->to(Auth::user()->email);
        */
        $this->to(env('EMAIL_ADMIN','armandoyepezjim@hotmail.com'));
        return $this->markdown('emails.books');
    }
}
