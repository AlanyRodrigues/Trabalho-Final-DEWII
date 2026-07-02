<?php

namespace App\Services;

use App\Models\PassageiroModel;

class PassageiroService
{
    protected PassageiroModel $model;

    public function __construct()
    {
        $this->model = new PassageiroModel();
    }

    public function listarPorUsuario($usuarioId)
    {
        return $this->model
            ->where('usuario_id', $usuarioId)
            ->findAll();
    }

    public function buscar($id)
    {
        return $this->model->find($id);
    }

    public function salvar(array $dados)
    {
        $this->model->insert($dados);

        return $this->model->getInsertID();
    }
}