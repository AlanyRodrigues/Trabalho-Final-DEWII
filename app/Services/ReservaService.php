<?php


use App\Models\VooModel;
use App\Models\PassageiroModel;

class ReservaService
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

    public function gerarLocalizador(): string
    {
        do {

            $codigo = strtoupper(substr(bin2hex(random_bytes(5)), 0, 8));

        } while ($this->reservaModel
                    ->where('codigo_localizador', $codigo)
                    ->first());

        return $codigo;
    }

    public function montarResumo(
        int $vooId,
        int $passageiroId,
        string $assento
    ): array
    {
        $voo = $this->vooModel->find($vooId);

        if (!$voo) {
            throw new \Exception("Voo não encontrado.");
        }

        $passageiro = $this->passageiroModel->find($passageiroId);

        if (!$passageiro) {
            throw new \Exception("Passageiro não encontrado.");
        }

        return [

            'voo'=>$voo,

            'passageiro'=>$passageiro,

            'assento'=>$assento,

            'duracao'=>$this->calcularDuracao(
                $voo['data_partida'],
                $voo['data_chegada']
            ),

            'valor_total'=>$voo['preco']

        ];
    }


    public function reservar(array $dados): int
    {
        $dados['codigo_localizador'] = $this->gerarLocalizador();

        $dados['status'] = 'confirmado';

        return $this->reservaModel->insert($dados);
    }

    public function listarPorUsuario(int $usuarioId): array
    {
        return $this->reservaModel
            ->select('
                reservas.*,
                voos.origem,
                voos.destino,
                voos.data_partida,
                voos.preco,
                passageiros.nome_completo
            ')
            ->join(
                'voos',
                'voos.id = reservas.voo_id'
            )
            ->join(
                'passageiros',
                'passageiros.id = reservas.passageiro_id'
            )
            ->where(
                'reservas.usuario_id',
                $usuarioId
            )
            ->orderBy(
                'voos.data_partida',
                'ASC'
            )
            ->findAll();
    }

    public function cancelar(int $id): bool
    {
        return $this->reservaModel->update($id, [

            'status'=>'cancelado'

        ]);
    }

    public function totalReservas(int $usuarioId): int
    {
        return $this->reservaModel
            ->where('usuario_id', $usuarioId)
            ->where('status', 'confirmado')
            ->countAllResults();
    }

    public function proximaViagem(int $usuarioId): ?array
    {
        return $this->reservaModel
            ->select('
                reservas.*,
                voos.origem,
                voos.destino,
                voos.data_partida
            ')
            ->join(
                'voos',
                'voos.id = reservas.voo_id'
            )
            ->where(
                'reservas.usuario_id',
                $usuarioId
            )
            ->where(
                'voos.data_partida >=',
                date('Y-m-d H:i:s')
            )
            ->orderBy(
                'voos.data_partida',
                'ASC'
            )
            ->first();
    }
}
