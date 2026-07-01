<div class="card card-busca shadow">

    <div class="card-body">

        <h3>Buscar Passagens</h3>

    <form action="<?= base_url('voos/buscar') ?>" method="GET">

        <?= csrf_field() ?>

        <?= $this->include('components/home/search_fields') ?>

        <div class="d-grid mt-4">

            <button
                class="btn btn-primary btn-lg">

                Buscar Voos

            </button>

        </div>

    </form>

    </div>

</div>
