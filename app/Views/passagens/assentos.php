<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <?= $this->include('components/shared/breadcrumb') ?>

    <h2 class="fw-bold mb-4">

        Escolha seu assento

    </h2>

    <div class="row">

        <div class="col-lg-8">

            <?= $this->include('components/passagens/seat_map') ?>

        </div>

        <div class="col-lg-4">

            <?= $this->include('components/passagens/flight_info') ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>