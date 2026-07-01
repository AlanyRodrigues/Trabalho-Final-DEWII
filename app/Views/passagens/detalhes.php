<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <?= $this->include('components/shared/breadcrumb') ?>

    <h2 class="fw-bold mb-4">
        Detalhes do voo
    </h2>

    <?= $this->include('components/passagens/flight_info') ?>

    <div class="d-flex justify-content-between mt-4">

        <a href="<?= previous_url() ?>" class="btn btn-outline-secondary">
            Voltar
        </a>

        <a href="<?= base_url('passagens/assentos/'.$voo['id']) ?>"
           class="btn btn-primary">

            Escolher Assento

        </a>

    </div>

</div>

<?= $this->endSection() ?>