<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="mb-4">

        <h2 class="fw-bold">
            Confirmar Reserva
        </h2>

        <p class="text-muted mb-0">
            Confira todos os dados antes de concluir sua compra.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-lg-8">

            <?= $this->include('components/passagens/flight_info') ?>

            <?= $this->include('components/passagens/passenger_info') ?>

        </div>

        <div class="col-lg-4">

            <?= $this->include('components/passagens/price_breakdown') ?>

            <?= $this->include('components/passagens/confirm_button') ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>