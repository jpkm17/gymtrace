<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacaoAlunoMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $mensagem;

    public function __construct($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function build()
    {
        return $this->subject('Notificação da Academia')
                    ->view('emails.notificacao');
    }
}
