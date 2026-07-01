<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">

    <h2 class="mb-4">

        Resultados da pesquisa

    </h2>

    <?= $this->include('components/home/search_results') ?>

</div>

<?= $this->endSection() ?>