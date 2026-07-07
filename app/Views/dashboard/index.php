<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary px-3">
    <span class="navbar-brand">✈ AeroPassagens</span>

    <div>
        <span class="text-white me-3">
            Olá, <?= esc($user_name) ?>
        </span>

        <a href="/logout" class="btn btn-light btn-sm">
            Sair
        </a>
    </div>
</nav>

<div class="container mt-4">

    <div class="row">

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>👤 Usuário</h5>
                <p><strong>Nome:</strong> <?= esc($user_name) ?></p>
                <p><strong>Email:</strong> <?= esc($user_email) ?></p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card p-3 shadow-sm">
                <h5>✈ Ações rápidas</h5>

                <a href="/" class="btn btn-primary mt-2">
                    Buscar voos
                </a>

                <a href="#tabela-reservas" class="btn btn-outline-primary mt-2">                    Minhas passagens
                </a>
            </div>
        </div>

    </div>

    <div id="tabela-reservas" class="mt-4">
        <div class="card p-3 shadow-sm">
            <h5>📄 Últimas reservas</h5>

            <?php if(empty($reservations)): ?>
                <p class="text-muted">Você ainda não realizou nenhuma compra.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Voo</th>
                            <th>Assentos</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($reservations as $r): ?>
                            <tr>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['flight_id'] ?></td>
                                <td><?= $r['seat_quantity'] ?></td>
                                <td>R$ <?= number_format($r['total_price'], 2, ',', '.') ?></td>
                                <td>
                                    <span class="badge bg-warning">
                                        <?= $r['status'] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>

</div>

</body>
</html>