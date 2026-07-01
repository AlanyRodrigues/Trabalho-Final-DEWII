<?php

namespace App\Models;

use CodeIgniter\Model;

class AssentoModel extends Model
{
    protected $table = 'assentos';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'voo_id',
        'numero',
        'tipo',
        'classe',
        'ocupado'
    ];
}