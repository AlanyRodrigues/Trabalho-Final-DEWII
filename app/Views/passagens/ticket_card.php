<div class="card shadow">

    <div class="card-body">

        <h5>

            <?= esc($voo['companhia']) ?>

        </h5>

        <p><?= esc($voo['origem']) ?> → <?= esc($voo['destino']) ?></p>

        <p><?= date('d/m/Y H:i', strtotime($voo['data_partida'])) ?></p>

        <p>

            <strong>Localizador:</strong>

            <?= esc($codigo) ?>

        </p>

        <span class="badge bg-success">

            <?= esc($status) ?>

        </span>

    </div>

</div>