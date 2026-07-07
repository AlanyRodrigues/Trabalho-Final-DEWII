<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ReservaModel;

class Dashboard extends BaseController
{
    public function index()
    {

        $logado = session()->get('logado');
    
        if (!$logado) {
            die("Sessão não encontrada! O login não salvou o usuário. Volte e logue novamente.");
        }



        if (!session()->get('logado')) {
            return redirect()->to('/login');
        }

        $usuarioId = session()->get('usuario_id');

        // Busca os dados do usuário logado
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($usuarioId);

        // Busca as reservas do usuário
        $reservaModel = new ReservaModel();
        $reservas = $reservaModel->where('usuario_id', $usuarioId)->findAll();

        
        $dados = [
            'user_name'    => $usuario['nome'],
            'user_email'   => $usuario['email'],
            'reservations' => $reservas
        ];

        return view('dashboard/index', $dados);
    }
}