<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('logado')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login'); 
    }

    public function autenticar()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $usuarioModel = new UsuarioModel();
        $user = $usuarioModel->where('email', $email)->first();

        if ($user && $senha === $user['senha']) {
            
            session()->destroy();
            
            session()->start();

            session()->set([
                'usuario_id' => $user['id'],
                'nome'       => $user['nome'],
                'email'      => $user['email'],
                'logado'     => true
            ]);
            
            session()->regenerate(true);
            
            // Redireciona para o Dashboard
            return redirect()->to('/dashboard');
        }
        
        // Se der errado, volta para o login com a mensagem de erro
        return redirect()->back()->with('erro', 'E-mail ou senha incorretos.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}