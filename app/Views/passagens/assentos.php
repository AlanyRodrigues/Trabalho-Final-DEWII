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

<?= $this->section('scripts') ?>

<script src="<?= base_url('js/seat-map.js') ?>"></script>


    <form action="<?= site_url('passagens/passageiro') ?>" method="post">

        <?= csrf_field() ?>

        <input
            type="hidden"
            name="voo_id"
            value="<?= $voo['id'] ?>">

        <input
            type="hidden"
            name="assento_id"
            id="assentoSelecionado">

        <div class="row">

            <div class="col-lg-8">

                <?= $this->include('components/passagens/seat_map') ?>

            </div>

            <div class="col-lg-4">

                <?= $this->include('components/passagens/flight_info') ?>

            </div>

        </div>

        <div class="text-end mt-4">

            <button
                type="submit"
                class="btn btn-primary"
                id="btnContinuar"
                disabled>

                Continuar

            </button>

        </div>

    </form>

</div>

<?= $this->endSection() ?>