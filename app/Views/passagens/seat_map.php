<div class="card shadow-sm">

    <div class="card-header">

        Escolha seu assento

    </div>

    <div class="card-body">

        <div id="seat-map"
            data-voo="<?= $voo['id'] ?>"
            class="d-flex flex-wrap gap-2 justify-content-center">

            <div class="text-center">

                Carregando assentos...

            </div>

        </div>

        <hr>

        <div class="mt-3">

            <span class="badge bg-success">Livre</span>

            <span class="badge bg-danger">Ocupado</span>

            <span class="badge bg-primary">Selecionado</span>

        </div>

    </div>

</div>