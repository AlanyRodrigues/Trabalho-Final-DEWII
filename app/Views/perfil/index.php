<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary px-3">
    <span class="navbar-brand">✈ AeroPassagens</span>

    <a href="/dashboard" class="btn btn-light btn-sm">
        Voltar
    </a>
</nav>

<div class="container mt-4">

    <h3>👤 Meu Perfil</h3>

    <!-- ALERTAS -->
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

    <div class="row mt-3">

        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5>Dados pessoais</h5>

                <form method="POST" action="/profile/update">

                    <?= csrf_field() ?>

                    <label>Nome</label>
                    <input type="text" name="name" class="form-control"
                           value="<?= esc($user['name']) ?>" required>

                    <label class="mt-2">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= esc($user['email']) ?>" required>

                    <button class="btn btn-primary mt-3 w-100">
                        Atualizar dados
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3 shadow-sm">
                <h5> Alterar senha</h5>

                <form method="POST" action="/profile/change-password">

                    <?= csrf_field() ?>

                    <label>Senha atual</label>
                    <input type="password" name="current_password" class="form-control" required>

                    <label class="mt-2">Nova senha</label>
                    <input type="password" name="new_password" class="form-control" required>

                    <button class="btn btn-warning mt-3 w-100">
                        Alterar senha
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>

</body>
</html>