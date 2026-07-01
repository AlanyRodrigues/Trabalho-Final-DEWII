<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container py-5 text-center">

    <div class="display-1 text-success">

        ✓

    </div>

    <h2 class="fw-bold">

        Reserva realizada com sucesso!

    </h2>

    <p class="lead">

        Seu código localizador é:

    </p>

    <h1 class="text-primary">

        <?= $codigo ?>

    </h1>

    <div class="mt-5">

        <a href="<?= base_url('reservas/pdf/'.$codigo) ?>"
           class="btn btn-danger">

            Baixar PDF

        </a>

        <a href="<?= base_url('dashboard') ?>"
           class="btn btn-primary">

            Minhas Reservas

        </a>

    </div>

</div>

<?= $this->endSection() ?>