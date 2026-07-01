<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="fw-bold mb-4">

        Dados do Passageiro

    </h2>

    <div class="row">

        <div class="col-lg-8">

            <?= $this->include('components/passagens/passenger_form') ?>

        </div>

        <div class="col-lg-4">

            <?= $this->include('components/passagens/reservation_summary') ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>