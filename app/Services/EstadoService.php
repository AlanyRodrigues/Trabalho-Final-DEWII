<?php

namespace App\Services;

use App\Models\EstadoModel;

class EstadoService 
{
    public function getEstados() 
    {
        try {
            $estadoModel = new EstadoModel();
            
            $estados = $estadoModel->getEstados(); 

            return [
                'status' => 'success',
                'data'   => $estados
            ];

        } catch (\Exception $e) {
            return [
                'status'  => 'error',
                'message' => "Erro no banco de dados: " . $e->getMessage()
            ];
        }
    }
}