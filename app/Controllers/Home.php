<?php

namespace App\Controllers;

use App\Models\VooModel;
use App\Services\VooService;

class Home extends BaseController
{
    public function index()
    {

        $service = new VooService();

        $dados = [

            'origens' => $service->listarOrigens(),

            'destinos' => $service->listarDestinos()

        ];

        return view('home/index', $dados);
    }
}
