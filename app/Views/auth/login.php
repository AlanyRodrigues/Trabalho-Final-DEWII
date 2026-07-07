<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #1a73e8, #00c6ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h3 class="title">✈ Sistema de Passagens</h3>

    <?php if(session()->getFlashdata('erro')): ?>
        <div class="alert alert-danger text-center">
            <?= session()->getFlashdata('erro') ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/auth/login">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Entrar
        </button>
    </form>

    <hr>

    <p class="text-center mb-1">
        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal">

        <a href="<?= base_url('forgot-password') ?>">
            Esqueci minha senha
        </a>
    </p>

    <p class="text-center">
        <small>Não possui conta? Fale com o administrador.</small>
    </p>

</div>

<div class="modal fade" id="forgotModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Recuperação de Senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form method="POST" action="/auth/forgot-password">
          <div class="modal-body">

              <p>Digite seu e-mail cadastrado para receber o link de redefinição de senha.</p>

              <input type="email" name="email" class="form-control" required>
          </div>

          <div class="modal-footer">
              <button type="submit" class="btn btn-primary w-100">
                  Enviar link de recuperação
              </button>
          </div>
      </form>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>