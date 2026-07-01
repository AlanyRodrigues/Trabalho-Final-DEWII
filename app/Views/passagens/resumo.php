<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="fw-bold mb-4">

        Resumo da Reserva

    </h2>

    <?= $this->include('components/passagens/reservation_summary') ?>

    <div class="text-end mt-4">

        <button class="btn btn-success btn-lg">

            Confirmar Reserva

        </button>

    </div>

</div>

<?= $this->endSection() ?>