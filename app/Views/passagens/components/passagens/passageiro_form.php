<form action="<?= site_url('passagens/confirmar') ?>" method="post">

    <?= csrf_field() ?>

    <input
        type="hidden"
        name="voo_id"
        value="<?= $voo['id'] ?>">

    <input
        type="hidden"
        name="assento_id"
        value="<?= $assento ?>">

    <div class="mb-3">
        <label class="form-label">Passageiro</label>

        <select
            class="form-select"
            name="passageiro_id"
            required>

            <option value="">Selecione...</option>

            <?php foreach ($passageiros as $passageiro): ?>

                <option value="<?= $passageiro['id'] ?>">

                    <?= esc($passageiro['nome_completo']) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Confirmar Reserva

    </button>

</form>