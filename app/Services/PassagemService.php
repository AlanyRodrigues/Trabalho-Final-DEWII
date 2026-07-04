<?php

namespace App\Services;

use App\Models\ReservaModel;
use App\Models\VooModel;
use App\Models\PassageiroModel;

class PassagemService
{
    protected ReservaModel $reservaModel;
    protected VooModel $vooModel;
    protected PassageiroModel $passageiroModel;

    public function __construct()
    {
        $this->reservaModel = new ReservaModel();
        $this->vooModel = new VooModel();
        $this->passageiroModel = new PassageiroModel();
    }

    public function montarResumo(
        int $vooId,
        int $passageiroId,
        string $assento
    ): array {

        $voo = $this->vooModel->find($vooId);

        if (!$voo) {
            throw new \Exception('Voo não encontrado.');
        }

        $passageiro = $this->passageiroModel->find($passageiroId);

        if (!$passageiro) {
            throw new \Exception('Passageiro não encontrado.');
        }

        return [
            'voo' => $voo,
            'passageiro' => $passageiro,
            'assento' => $assento,
            'duracao' => $this->calcularDuracao(
                $voo['data_partida'],
                $voo['data_chegada']
            ),
            'valor_total' => $voo['preco']
        ];
    }

    public function calcularDuracao(
        string $saida,
        string $chegada
    ): string {

        $inicio = new \DateTime($saida);

        $fim = new \DateTime($chegada);

        $intervalo = $inicio->diff($fim);

        return sprintf(
            '%dh %02dmin',
            $intervalo->h,
            $intervalo->i
        );
    }

    public function buscarPorCodigo(string $codigo): ?array
    {
        return $this->reservaModel
            ->select('
                reservas.*,
                voos.*,
                passageiros.*
            ')
            ->join('voos', 'voos.id = reservas.voo_id')
            ->join('passageiros', 'passageiros.id = reservas.passageiro_id')
            ->where('codigo_localizador', $codigo)
            ->first();
    }

    public function gerarBilhete(string $codigo): array
    {
        $reserva = $this->buscarPorCodigo($codigo);

        if (!$reserva) {
            throw new \Exception('Passagem não encontrada.');
        }

        return [
            'codigo' => $reserva['codigo_localizador'],
            'status' => $reserva['status'],
            'voo' => [
                'companhia' => $reserva['companhia'],
                'origem' => $reserva['origem'],
                'destino' => $reserva['destino'],
                'partida' => $reserva['data_partida'],
                'chegada' => $reserva['data_chegada'],
                'preco' => $reserva['preco']
            ],
            'passageiro' => [
                'nome' => $reserva['nome_completo'],
                'cpf' => $reserva['cpf']
            ],
            'duracao' => $this->calcularDuracao(
                $reserva['data_partida'],
                $reserva['data_chegada']
            )
        ];
    }
}