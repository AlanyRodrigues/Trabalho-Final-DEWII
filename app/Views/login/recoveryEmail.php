<!DOCTYPE html>

<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<style>

body{

    font-family:Arial,Helvetica,sans-serif;

    background:#f4f4f4;

    padding:30px;

}

.container{

    background:white;

    border-radius:10px;

    padding:35px;

    max-width:600px;

    margin:auto;

}

.btn{

    display:inline-block;

    background:#0d6efd;

    color:white !important;

    text-decoration:none;

    padding:12px 25px;

    border-radius:6px;

    margin-top:20px;

}

.footer{

    margin-top:30px;

    font-size:13px;

    color:#777;

}

</style>

</head>

<body>

<div class="container">

<h2>

PrimeVoo - Recuperação de senha

</h2>

<p>

Olá <strong><?= esc($nome) ?></strong>,

</p>

<p>

Recebemos uma solicitação para redefinir sua senha.

</p>

<p>

Clique no botão abaixo.

</p>

<p>

<a
class="btn"
href="<?= $link ?>">

Redefinir Senha

</a>

</p>

<p>

Caso você não tenha solicitado esta alteração, ignore este e-mail.

</p>

<div class="footer">

PrimeVoo - Passagens Aéreas

</div>

</div>

</body>

</html>