<?php

namespace App\Controllers;

use App\Models\ClientesModel;
use App\Models\EstadoModel;
use App\Models\MunicipioModel;

class Clientes extends BaseController
{

    protected $ClientesModel;

    public function __construct()
    {
        $this->ClientesModel = new ClientesModel();
    }

    public function create()
    {
        $estadoModel = new EstadoModel();

        $data['estados'] = $estadoModel->findAll();

        $data['clientes'] = $this->ClientesModel->getClientesComLocalizacao();

        return view('index', $data);
    }

    public function edit($codigo)
    {
        $estadoModel = new EstadoModel();

        $data['cliente'] = $this->ClientesModel->find($codigo);
        $data['estados'] = $estadoModel->findAll();
        $data['clientes'] = $this->ClientesModel->getClientesComLocalizacao();

    return view('index', $data);
    return redirect()->to('/')
                 ->with('sucesso', 'Cliente atualizado com sucesso!');

    }

    public function update($codigo)
    {
        $this->ClientesModel->update($codigo, [
        'nome'      => $this->request->getPost('nome'),
        'cpf'       => preg_replace('/\D/', '', $this->request->getPost('cpf')),
        'estado_id' => $this->request->getPost('estado_id'),
        'cidade_id' => $this->request->getPost('cidade_id'),
    ]);

    return redirect()->to('/')
                     ->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    public function cadastro()
    {
    $this->ClientesModel->insert([
        'nome'      => $this->request->getPost('nome'),
        'cpf'       => preg_replace('/\D/', '', $this->request->getPost('cpf')),
        'estado_id' => $this->request->getPost('estado_id'),
        'cidade_id' => $this->request->getPost('cidade_id'),
    ]);

    return redirect()->to('/clientes/novo')
                     ->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    public function delete($codigo)
{
    $this->ClientesModel->delete($codigo);

    return redirect()->to('/clientes/novo')
                     ->with('sucesso', 'Cliente removido com sucesso!');
}

}