<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AprendizRegistrado extends Mailable
{
    use Queueable, SerializesModels;

    public $aprendiz;

    public function __construct($aprendiz)
    {
        $this->aprendiz = $aprendiz;
    }

    public function build()
    {
        return $this->subject('Nuevo Aprendiz Registrado - Sistema SENA')
            ->view('emails.aprendiz-registrado');
    }
}
