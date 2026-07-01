<div class="card shadow-sm">

    <div class="card-header">

        Informações do voo

    </div>

    <div class="card-body">

        <p><strong>Companhia:</strong> <?= esc($voo['companhia']) ?></p>

        <p><strong>Voo:</strong> <?= esc($voo['numero_voos']) ?></p>

        <p><strong>Origem:</strong> <?= esc($voo['origem']) ?></p>

        <p><strong>Destino:</strong> <?= esc($voo['destino']) ?></p>

        <p><strong>Partida:</strong> <?= date('d/m/Y H:i', strtotime($voo['data_partida'])) ?></p>

        <p><strong>Chegada:</strong> <?= date('d/m/Y H:i', strtotime($voo['data_chegada'])) ?></p>

        <p><strong>Duração:</strong> <?= $duracao ?></p>

        <hr>

        <h3 class="text-primary">

            R$ <?= number_format($voo['preco'],2,',','.') ?>

        </h3>

    </div>

</div>