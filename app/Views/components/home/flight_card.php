<div class="col-md-6">

    <div class="card border-0 shadow-sm h-100">

        <div class="card-body">

            <h5 class="fw-bold">
                ✈ <?= $voo['companhia'] ?> - <?= $voo['numero_voos'] ?>
            </h5>

            <p class="mb-1">
                <strong>Origem:</strong> <?= $voo['origem'] ?>
            </p>

            <p class="mb-1">
                <strong>Destino:</strong> <?= $voo['destino'] ?>
            </p>

            <p class="mb-1">
                <strong>Partida:</strong>
                <?= date('d/m/Y H:i', strtotime($voo['data_partida'])) ?>
            </p>

            <p class="mb-1">
                <strong>Chegada:</strong>
                <?= date('d/m/Y H:i', strtotime($voo['data_chegada'])) ?>
            </p>

            <p class="mb-1">
                <strong>Classe:</strong> <?= $voo['classe'] ?>
            </p>

            <p class="fw-bold text-primary mt-2">
                R$ <?= number_format($voo['preco'], 2, ',', '.') ?>
            </p>

            <p class="text-muted">
                Assentos disponíveis: <?= $voo['assentos_disponiveis'] ?>
            </p>

            <a href="<?= base_url('voos/detalhes/' . $voo['id']) ?>"
                class="btn btn-primary w-100">
                    Selecionar voo
            </a>

        </div>

    </div>

</div>