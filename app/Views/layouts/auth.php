<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'PrimeVoo' ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="text-center mb-4">

                <a href="<?= base_url('/') ?>" class="text-decoration-none">
                    <h1 class="text-primary fw-bold">
                        PrimeVoo
                    </h1>
                </a>

                <p class="text-muted">
                    Sistema de Compra de Passagens
                </p>

            </div>

            <div class="card shadow">

                <div class="card-body p-4">

                    <?= $this->renderSection('content') ?>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
