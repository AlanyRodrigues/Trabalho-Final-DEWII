<div class="card card-busca shadow">
    <div class="card-body">
        <h3>Buscar Passagens</h3>
        
        <form id="formBuscaVoos" action="<?= base_url('ajax/buscar-voos') ?>" method="GET">
            <?= csrf_field() ?>
            
            <?= $this->include('components/home/search_fields') ?>
            
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    Buscar Voos
                </button>
            </div>
        </form>
    </div>
</div>
