<div class="mb-3">

    <label for="origem" class="form-label">

        Origem

    </label>

    <select
        class="form-select"
        id="origem"
        name="origem"
        required>

        <option value="">

            Selecione a origem

        </option>

        <?php if(isset($origens)): ?>

            <?php foreach($origens as $origem): ?>

                <option value="<?= esc($origem['origem']) ?>">

                    <?= esc($origem['origem']) ?>

                </option>

            <?php endforeach; ?>

        <?php endif; ?>

    </select>

</div>



<div class="mb-3">

    <label for="destino" class="form-label">

        Destino

    </label>

    <select
        class="form-select"
        id="destino"
        name="destino"
        required>

        <option value="">

            Selecione o destino

        </option>

        <?php if(isset($destinos)): ?>

            <?php foreach($destinos as $destino): ?>

                <option value="<?= esc($destino['destino']) ?>">

                    <?= esc($destino['destino']) ?>

                </option>

            <?php endforeach; ?>

        <?php endif; ?>

    </select>

</div>



<div class="mb-3">

    <label
        for="data_partida"
        class="form-label">

        Data da Viagem

    </label>

    <input

        type="date"

        id="data_partida"

        name="data_partida"

        class="form-control"

        required

    >

</div>



<div class="mb-4">

    <label
        for="passageiros"
        class="form-label">

        Quantidade de Passageiros

    </label>

    <input

        type="number"

        class="form-control"

        id="passageiros"

        name="passageiros"

        value="1"

        min="1"

        max="8"

        required

    >

</div>
