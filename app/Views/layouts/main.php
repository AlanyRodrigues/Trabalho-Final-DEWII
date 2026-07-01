<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title><?= $title ?? 'PrimeVoo' ?></title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link
        rel="stylesheet"
        href="<?= base_url('css/style.css') ?>">

</head>

<body>

<?= $this->include('components/shared/navbar') ?>

<?= $this->renderSection('content') ?>

<?= $this->include('components/shared/footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
