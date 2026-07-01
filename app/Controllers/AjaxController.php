<?php

namespace App\Controllers;

use App\Services\VooService;
use App\Services\AssentoService;
use App\Services\PassageiroService;
use CodeIgniter\Exceptions\PageNotFoundException;

class AjaxController extends BaseController
{
    protected VooService $vooService;
    protected AssentoService $assentoService;
    protected PassageiroService $passageiroService;

    public function __construct()
    {
        $this->vooService = new VooService();
        $this->assentoService = new AssentoService();
        $this->passageiroService = new PassageiroService();
    }

    private function validarAjax()
    {
        if (!$this->request->isAJAX()) {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function destinosPorOrigem($origem)
    {
        $this->validarAjax();

        return $this->response->setJSON(
            $this->vooService->listarDestinosPorOrigem(urldecode($origem))
        );
    }

    public function buscarVoos()
    {
        $this->validarAjax();

        $filtros = [

            'origem' => $this->request->getGet('origem'),

            'destino' => $this->request->getGet('destino'),

            'data' => $this->request->getGet('data_partida')

        ];

        return $this->response->setJSON(
            $this->vooService->buscar($filtros)
        );
    }

    public function assentos($vooId)
    {
        $this->validarAjax();

        return $this->response->setJSON(
            $this->assentoService->listarPorVoo($vooId)
        );
    }

    public function verificarAssento($assentoId)
    {
        $this->validarAjax();

        return $this->response->setJSON([
            'disponivel' => $this->assentoService->assentoDisponivel($assentoId)
        ]);
    }

    public function passageiros()
    {
        $this->validarAjax();

        $usuarioId = session()->get('usuario_id');

        return $this->response->setJSON(
            $this->passageiroService->listarPorUsuario($usuarioId)
        );
    }
}