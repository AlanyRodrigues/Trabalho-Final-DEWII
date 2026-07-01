<form method="post">

    <?= csrf_field() ?>

    <div class="mb-3">

        <label class="form-label">

            Passageiro

        </label>

        <select class="form-select">

            <option>

                Selecione

            </option>

        </select>

    </div>

    <div class="mb-3">

        <label>

            Ou cadastrar novo

        </label>

    </div>

    <div class="mb-3">

        <input type="text"
               class="form-control"
               placeholder="Nome completo">

    </div>

    <div class="mb-3">

        <input type="text"
               class="form-control"
               placeholder="CPF">

    </div>

    <div class="mb-3">

        <input type="date"
               class="form-control">

    </div>

    <button class="btn btn-primary">

        Continuar

    </button>

</form>