<?php

namespace App\Services;

use App\Models\VooModel;

class VooService
{

    private VooModel $vooModel;

    public function __construct()
    {
        $this->vooModel = new VooModel();
    }

    public function listarOrigens()
    {

        return $this->vooModel

            ->select('origem')

            ->distinct()

            ->orderBy('origem')

            ->findAll();

    }

    public function listarDestinos()
    {

        return $this->vooModel

            ->select('destino')

            ->distinct()

            ->orderBy('destino')

            ->findAll();

    }

    public function buscar(array $filtros)
    {

        $builder = $this->vooModel;

        if (!empty($filtros['origem'])) {

            $builder->where('origem', $filtros['origem']);

        }

        if (!empty($filtros['destino'])) {

            $builder->where('destino', $filtros['destino']);

        }

        if (!empty($filtros['data'])) {

            $builder->where("DATE(data_partida)", $filtros['data']);

        }

        if (!empty($filtros['companhia'])) {

            $builder->where('companhia', $filtros['companhia']);

        }

        return $builder

            ->orderBy('data_partida')

            ->findAll();

    }

    public function calcularDuracao(array $voo): string
    {
        $inicio = new DateTime($voo['data_partida']);
        $fim = new DateTime($voo['data_chegada']);

        $intervalo = $inicio->diff($fim);

        return sprintf('%dh %02dmin', $intervalo->h, $intervalo->i);
    }

}