<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="login-card">

    <h3 class="title">

        Redefinir Senha

    </h3>

    <p class="text-muted text-center mb-4">

        Digite sua nova senha.

    </p>

    <?php if(session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">

            <?= session()->getFlashdata('error') ?>

        </div>

    <?php endif; ?>

    <form action="<?= base_url('auth/reset-password') ?>" method="post">

        <?= csrf_field() ?>

        <input
            type="hidden"
            name="token"
            value="<?= esc($token) ?>">

        <div class="mb-3">

            <label class="form-label">

                Nova senha

            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                minlength="6"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Confirmar senha

            </label>

            <input
                type="password"
                name="confirm_password"
                class="form-control"
                minlength="6"
                required>

        </div>

        <button
            type="submit"
            class="btn btn-success w-100">

            Alterar senha

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