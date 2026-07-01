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

    /*
     * Lista origens únicas
     */

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

}