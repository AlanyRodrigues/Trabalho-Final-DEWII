<?php

namespace App\Services;

use App\Models\AssentoModel;

class AssentoService
{
    protected AssentoModel $model;

    public function __construct()
    {
        $this->model = new AssentoModel();
    }

    public function listarPorVoo(int $vooId): array
    {
        return $this->model
            ->where('voo_id', $vooId)
            ->orderBy('numero')
            ->findAll();
    }

    public function assentoDisponivel(int $id): bool
    {
        $assento = $this->model->find($id);

        return $assento && !$assento['ocupado'];
    }

    public function ocuparAssento(int $id): bool
    {
        return $this->model->update($id, [
            'ocupado' => true
        ]);
    }

    public function liberarAssento(int $id): bool
    {
        return $this->model->update($id, [
            'ocupado' => false
        ]);
    }
}