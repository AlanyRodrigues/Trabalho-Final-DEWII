<?php

namespace App\Models;

use CodeIgniter\Model;

class PassageiroModel extends Model
{
    protected $table = 'passageiros';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $allowedFields = ['usuario_id', 'nome_completo', 'documento_cpf', 'data_nascimento'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}

?> 
