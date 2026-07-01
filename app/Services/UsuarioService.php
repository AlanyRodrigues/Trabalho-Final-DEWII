<?php

namespace App\Services;

use App\Models\UsuarioModel;

class UsuarioService {

    public function getUsuarios() {
        try {
            $usuarioModel  = new UsuarioModel();
            $usuarios = $usuarioModel->findAll(); 

            return [
                'status' => 'success',
                'data'   => $usuarios
            ];

        } catch (\Exception $e) {
            return [
                'status'  => 'error',
                'message' => "Erro no banco de dados: " . $e->getMessage()
            ];
        }
    }

    public function cadastrarUsuario(array $dados) {
        try {
            $usuarioModel  = new UsuarioModel();

            $dados['senha'] = $dados['senha'];
            $dados['token_recuperacao'] = '';

            $usuarioModel->insert($dados);

            return [
                'status' => 'success',
                'message' => 'Usuário cadastrado com sucesso.'
            ];

        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function loginUsuario($email, $senha) {
        try {
            $usuarioModel  = new UsuarioModel();

            $usuario = $usuarioModel
                ->where('email', $email)
                ->first();

            if (!$usuario) {
                return [
                    'status' => 'error',
                    'message' => 'Usuário não encontrado.'
                ];
            }

            if ($usuario['senha'] !== $senha) {
                return [
                    'status' => 'error',
                    'message' => 'Senha incorreta.'
                ];
            }

            return [
                'status' => 'success',
                'data' => $usuario
            ];

        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
