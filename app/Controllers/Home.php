<?php

namespace App\Controllers;

use App\Models\EstadoModel;
use App\Models\ClientesModel;

class Home extends BaseController
{
    public function index(): string
    {
        $estadoModel = new EstadoModel();
        $clienteModel = new ClientesModel();

        $data['estados'] = $estadoModel
            ->orderBy('nome', 'ASC')
            ->findAll();

        $data['clientes'] = $clienteModel
            ->getClientesComLocalizacao();

        return view('index', $data);
    }

    public function buscarCidades($idEstado)
    {
        $municipioModel = new \App\Models\MunicipioModel();

        $cidades = $municipioModel
            ->where('ufid', $idEstado)
            ->orderBy('nome', 'ASC')
            ->findAll();

        return $this->response->setJSON($cidades);
    }
}