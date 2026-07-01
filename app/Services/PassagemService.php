<?php

namespace App\Services;

use App\Models\MunicipioModel;

class MunicipioService 
{
    public function getMunicipiosByEstado($estadoId) 
    {
        try {
            $municipioModel = new MunicipioModel();
            
            $municipios = $municipioModel->getMunicipiosByEstado($estadoId);

            if (empty($municipios)) {
                return [
                    'status'  => 'error',
                    'message' => 'Estado não encontrado.'
                ];
            }

            return [
                'status' => 'success',
                'data'   => $municipios
            ];

        } catch (\Exception $e) {
            return [
                'status'  => 'error',
                'message' => "Erro no banco de dados: " . $e->getMessage()
            ];
        }
    }
}