<?php

namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    /**
     * LOGIN DO USUÁRIO
     */
    public function login(string $email, string $password): bool
    {
        $user = $this->userModel->where('email', $email)->first();

        // Usuário não encontrado
        if (!$user) {
            return false;
        }

        // Verifica senha (hash recomendado)
        if (!password_verify($password, $user['password'])) {
            return false;
        }

        // Criação da sessão
        $this->session->set([
            'user_id'   => $user['id'],
            'user_name' => $user['name'],
            'user_email'=> $user['email'],
            'logged_in' => true
        ]);

        return true;
    }

    public function isLoggedIn(): bool
    {
        return $this->session->get('logged_in') === true;
    }

    public function logout(): void
    {
        $this->session->destroy();
    }

    public function getUser()
    {
        if (!$this->isLoggedIn()) {
            return null;
        }

        return [
            'id'    => $this->session->get('user_id'),
            'name'  => $this->session->get('user_name'),
            'email' => $this->session->get('user_email')
        ];
    }
}