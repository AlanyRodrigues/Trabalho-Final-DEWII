<?php

namespace App\Services;

use Config\Services;

class EmailService
{
    protected $email;

    public function __construct()
    {
        $this->email = Services::email();
    }

    public function enviarRecuperacaoSenha(
        string $destinatario,
        string $nome,
        string $token
    ): bool {

        $link = base_url("reset-password/$token");

        $mensagem = view('emails/recovery_email', [

            'nome' => $nome,

            'link' => $link

        ]);

        $this->email->setTo($destinatario);

        $this->email->setSubject('Recuperação de Senha');

        $this->email->setMessage($mensagem);

        $this->email->setMailType('html');

        return $this->email->send();
    }

    public function getDebug()
    {
        return $this->email->printDebugger(['headers']);
    }
}