<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function getEstados()
    {
        return $this->orderBy('nome', 'ASC')->findAll();
    }

}

?>