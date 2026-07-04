<?php

namespace App\Services;

use App\Models\UsuarioModel;
use App\Services\EmailService;

class LoginService
{
    protected UsuarioModel $usuarioModel;

    protected EmailService $emailService;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();

        $this->emailService = new EmailService();
    }

    public function autenticar(string $email, string $senha): bool
    {
        $usuario = $this->buscarPorEmail($email);

        if (!$usuario) {
            return false;
        }

        if (!password_verify($senha, $usuario['senha'])) {
            return false;
        }

        $this->criarSessao($usuario);

        return true;
    }

    public function criarSessao(array $usuario): void
    {
        session()->set([

            'usuario_id' => $usuario['id'],

            'usuario_nome' => $usuario['nome'],

            'usuario_email' => $usuario['email'],

            'logado' => true

        ]);
    }

    public function logout(): void
    {
        session()->destroy();
    }

    public function estaLogado(): bool
    {
        return session()->get('logado') === true;
    }

    public function usuarioLogado(): ?array
    {
        if (!$this->estaLogado()) {
            return null;
        }

        return $this->usuarioModel->find(
            session()->get('usuario_id')
        );
    }

    public function buscarPorEmail(string $email): ?array
    {
        return $this->usuarioModel
            ->where('email', $email)
            ->first();
    }

    public function gerarTokenRecuperacao(): string
    {
        return bin2hex(random_bytes(32));
    }

    public function salvarToken(int $usuarioId): string
    {
        $token = $this->gerarTokenRecuperacao();

        $this->usuarioModel->update($usuarioId, [

            'token_recuperacao' => $token

        ]);

        return $token;
    }

    public function buscarPorToken(string $token): ?array
    {
        return $this->usuarioModel
            ->where('token_recuperacao', $token)
            ->first();
    }

    public function redefinirSenha(
        int $usuarioId,
        string $novaSenha
    ): bool {

        return $this->usuarioModel->update($usuarioId, [

            'senha' => $novaSenha,

            'token_recuperacao' => null

        ]);
    }

    public function tokenValido(string $token): bool
    {
        return $this->usuarioModel
        ->where('token_recuperacao', $token)
        ->countAllResults() > 0;
    }

    public function enviarRecuperacao(string $email): bool
    {
        $usuario = $this->buscarPorEmail($email);

        if (!$usuario) {

            return false;

        }

        $token = $this->salvarToken($usuario['id']);

        return $this->emailService->enviarRecuperacaoSenha(

            $usuario['email'],

            $usuario['nome'],

            $token

        );

        if (!$this->emailService->enviarRecuperacaoSenha(
            $usuario['email'],
            $usuario['nome'],
            $token
        )) {
            return false;
            }

        return true;
    }
}