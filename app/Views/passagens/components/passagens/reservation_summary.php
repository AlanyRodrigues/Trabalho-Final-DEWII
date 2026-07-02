<div class="card">

    <div class="card-header">

        Resumo

    </div>

    <div class="card-body">

        <p><strong>Origem:</strong> <?= esc($voo['origem']) ?></p>

        <p><strong>Destino:</strong> <?= esc($voo['destino']) ?></p>

        <p><strong>Assento:</strong> <?= $assento ?? '-' ?></p>

        <hr>

        <h4>

            Total

        </h4>

        <h2 class="text-primary">

            R$ <?= number_format($voo['preco'],2,',','.') ?>

        </h2>

    </div>

</div>