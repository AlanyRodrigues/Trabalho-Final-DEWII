<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">

            <i class="bi bi-person-fill me-2"></i>

            Dados do Passageiro

        </h5>

    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-12">

                <label class="text-muted small">

                    Nome Completo

                </label>

                <div class="fw-semibold">

                    <?= esc($passageiro['nome_completo']) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">

                    CPF

                </label>

                <div>

                    <?= esc($passageiro['documento_cpf']) ?>

                </div>

            </div>

            <div class="col-md-6">

                <label class="text-muted small">

                    Data de Nascimento

                </label>

                <div>

                    <?= date('d/m/Y', strtotime($passageiro['data_nascimento'])) ?>

                </div>

            </div>

        </div>

    </div>

</div>