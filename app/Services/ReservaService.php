<?php

namespace App\Services;

use App\Models\ReservaModel;
use App\Models\AssentoModel;
use App\Models\VooModel;

class ReservaService {
    protected $reservaModel;
    protected $assentoModel;
    protected $vooModel;

    public function __construct() {
        $this->reservaModel = new ReservaModel();
        $this->assentoModel = new AssentoModel();
        $this->vooModel = new VooModel();
    }

    public function criarReserva(array $dados){
        try {
            $assento = $this->assentoModel->find($dados['assento_id']); //busca

            if (!$assento) {
                return [
                    'status' => false,
                    'mensagem' => 'Assento não encontrado.'
                ];
            }

            if ($assento['voo_id'] != $dados['voo_id']) { //verifica assento e voo
                return [
                    'status' => false,
                    'mensagem' => 'O assento não pertence a este voo.'
                ];
            }

            if ($assento['ocupado']) { //esta ocupado?
                return [
                    'status' => false,
                    'mensagem' => 'Assento ocupado.'
                ];
            }

            if (!$this->reservaModel->insert($dados)) { // salvar
                return [
                    'status' => false,
                    'mensagem' => 'Erro ao criar reserva.'
                ];
            }

            $this->assentoModel->update( //ocupado
                $dados['assento_id'],
                ['ocupado' => true]
            );

            $voo = $this->vooModel->find($dados['voo_id']); //marca como ocupado e diminui o disponivel
            $this->vooModel->update(
                $dados['voo_id'],
                [
                    'assentos_disponiveis' =>
                        $voo['assentos_disponiveis'] - 1
                ]
            );

            return [
                'status' => true,
                'mensagem' => 'Reserva registrada.'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }

        //IMPLEMENTAR ESTE CODIDO_LOCALIZADOR
        /*                AQUI             */
    }

    public function cancelarReserva($id) {
        try {
            $reserva = $this->reservaModel->find($id);

            if (!$reserva) {
                return [
                    'status' => false,
                    'mensagem' => 'Reserva não encontrada.'
                ];
            }

            if ($reserva['status'] == 'cancelada') {
                return [
                    'status' => false,
                    'mensagem' => 'A reserva já foi cancelada.'
                ];
            }

            $this->reservaModel->update($id, [
                'status' => 'cancelada'
            ]);

            $this->assentoModel->update(
                $reserva['assento_id'],
                ['ocupado' => false]
            );

            $voo = $this->vooModel->find($reserva['voo_id']); //disponibiliza e adiciona
            $this->vooModel->update(
                $reserva['voo_id'],
                [
                    'assentos_disponiveis' =>
                        $voo['assentos_disponiveis'] + 1
                ]
            );

            return [
                'status' => true,
                'mensagem' => 'Reserva cancelada.'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function listarReserva(){
        try {
            return $this->reservaModel->findAll();
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        
    }

    public function buscarReserva($id) { 
        try {
            return $this->reservaModel->find($id);
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

}
