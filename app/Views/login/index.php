<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="page-body">
    <div class="main-container">
        <h1>Login</h1>

        <?php
            if (session()->getFlashData('error')) {
                echo "<p style='color:red'>" . session()->getFlashData('error') . "</p>";
            }
        ?>

        <form method="post" action="<?= base_url('do-login')?>">
            <input 
                name="nome"
                type="text" 
                class="form-input"
                placeholder="Digite seu usuário" 
                required
            >

            <input 
                name="senha"
                type="password" 
                class="form-input"
                placeholder="Digite sua senha" 
                required
            >

            <button type="submit" class="primary-button">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
