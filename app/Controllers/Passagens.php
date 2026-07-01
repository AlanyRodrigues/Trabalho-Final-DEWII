<?php

namespace App\Controllers;

use App\Services\VooService;
use CodeIgniter\Exceptions\PageNotFoundException;

class Passagens extends BaseController
{
    public function detalhes($id)
    {
        $vooService = new VooService();

        $voo = $vooService->buscarPorId($id);

        if (!$voo) {
            throw PageNotFoundException::forPageNotFound();
        }

        $dados = [
            'voo'      => $voo,
            'duracao'  => $vooService->calcularDuracao($voo)
        ];

        return view('passagens/detalhes', $dados);
    }
}