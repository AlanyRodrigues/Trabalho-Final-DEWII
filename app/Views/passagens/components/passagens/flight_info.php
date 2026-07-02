<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">

            <i class="bi bi-airplane-fill me-2"></i>

            Informações do Voo

        </h5>

    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-6">

                <label class="text-muted small">
                    Companhia
                </label>

                <div class="fw-semibold">

                    <?= esc($voo['companhia']) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">
                    Nº do voo
                </label>

                <div class="fw-semibold">

                    <?= esc($voo['numero_voos']) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">
                    Origem
                </label>

                <div>

                    <?= esc($voo['origem']) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">
                    Destino
                </label>

                <div>

                    <?= esc($voo['destino']) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">
                    Partida
                </label>

                <div>

                    <?= date('d/m/Y H:i', strtotime($voo['data_partida'])) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">
                    Chegada
                </label>

                <div>

                    <?= date('d/m/Y H:i', strtotime($voo['data_chegada'])) ?>

                </div>

            </div>

            <div class="col-md-4">

                <label class="text-muted small">
                    Classe
                </label>

                <div>

                    <?= esc($voo['classe']) ?>

                </div>

            </div>

            <div class="col-md-4">

                <label class="text-muted small">
                    Assento
                </label>

                <div>

                    <?= esc($assento) ?>

                </div>

            </div>

            <div class="col-md-4">

                <label class="text-muted small">
                    Duração
                </label>

                <div>

                    <?= esc($duracao) ?>

                </div>

            </div>

        </div>

    </div>

</div>