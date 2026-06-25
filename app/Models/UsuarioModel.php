<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'codigo';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = ['nome', 'cpf', 'estado_id', 'cidade_id'];

    public function getClientesComLocalizacao()
{
    return $this->select('clientes.*, municipios.nome as cidade_nome, estados.nome as estado_nome')
                ->join('municipios', 'municipios.id = clientes.cidade_id', 'left')
                ->join('estados', 'estados.id = clientes.estado_id', 'left')
                ->orderBy('clientes.nome', 'ASC')
                ->findAll();
}
}

?> 