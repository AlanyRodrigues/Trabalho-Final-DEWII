<?php

namespace App\Controllers;

use App\Services\MunicipioService;

class Municipios extends BaseController
{
    public function getByEstado($estadoId) 
    {
        if (!$this->request->isAJAX()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $municipioService = new MunicipioService();
        
        $r = $municipioService->getMunicipiosByEstado($estadoId);
        
        return $this->response->setJSON($r);
    }
}