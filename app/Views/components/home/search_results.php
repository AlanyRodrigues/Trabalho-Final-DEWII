<section class="py-5 bg-light">

    <div class="container">

        <h3 class="mb-4 fw-bold">
            Resultados da busca
        </h3>

        <?php if (empty($voos)): ?>

            <?= $this->include('components.home.empty_state') ?>

        <?php else: ?>

            <div class="row g-4">

                <?php foreach ($voos as $voo): ?>

                    <?= $this->include('components.home.flight_card', [
                        'voo' => $voo
                    ]) ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>