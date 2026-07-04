<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="login-card">

    <h3 class="title">
        Recuperação de Senha
    </h3>

    <p class="text-muted text-center mb-4">
        Informe o e-mail cadastrado para receber o link de redefinição.
    </p>

    <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success">

            <?= session()->getFlashdata('success') ?>

        </div>

    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">

            <?= session()->getFlashdata('error') ?>

        </div>

    <?php endif; ?>

    <form action="<?= base_url('auth/forgot-password') ?>" method="post">

        <?= csrf_field() ?>

        <div class="mb-3">

            <label class="form-label">

                E-mail

            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Digite seu e-mail"
                required>

        </div>

        <button
            type="submit"
            class="btn btn-primary w-100">

            Enviar link

        </button>

    </form>

    <hr>

    <div class="text-center">

        <a href="<?= base_url('login') ?>">

            Voltar ao login

        </a>

    </div>

</div>

<?= $this->endSection() ?>