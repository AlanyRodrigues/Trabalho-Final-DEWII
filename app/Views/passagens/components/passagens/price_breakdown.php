<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-success text-white">

        <h5 class="mb-0">

            <i class="bi bi-receipt me-2"></i>

            Resumo da Compra

        </h5>

    </div>

    <div class="card-body">

        <div class="d-flex justify-content-between mb-2">

            <span>Tarifa</span>

            <strong>

                R$ <?= number_format($voo['preco'], 2, ',', '.') ?>

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-2">

            <span>Taxa de embarque</span>

            <strong>R$ 0,00</strong>

        </div>

        <hr>

        <div class="d-flex justify-content-between fs-5">

            <strong>Total</strong>

            <strong class="text-success">

                R$ <?= number_format($valor_total, 2, ',', '.') ?>

            </strong>

        </div>

        <hr>

        <div class="small text-muted">

            <p class="mb-2">

                <i class="bi bi-check-circle-fill text-success me-2"></i>

                Reserva confirmada imediatamente após a conclusão.

            </p>

            <p class="mb-2">

                <i class="bi bi-shield-lock-fill text-success me-2"></i>

                Seus dados são protegidos durante toda a compra.

            </p>

            <p class="mb-0">

                <i class="bi bi-info-circle-fill text-primary me-2"></i>

                Confira as informações antes de finalizar.

            </p>

        </div>

    </div>

</div>