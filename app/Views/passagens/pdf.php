<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Passagem Aérea</title>

    <style>
        body {
            font-family: Arial;
        }

        .ticket {
            border: 2px dashed #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .info {
            margin-top: 15px;
        }

        .info p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

<div class="ticket">

    <h1>✈ PASSAGEM AÉREA</h1>

    <div class="info">
        <p><strong>Passageiro:</strong> <?= esc($user_name) ?></p>
        <p><strong>Email:</strong> <?= esc($user_email) ?></p>

        <hr>

        <p><strong>ID da Reserva:</strong> <?= $reservation['id'] ?></p>
        <p><strong>Voo:</strong> <?= $reservation['flight_id'] ?></p>
        <p><strong>Assentos:</strong> <?= $reservation['seat_quantity'] ?></p>
        <p><strong>Total:</strong> R$ <?= number_format($reservation['total_price'], 2, ',', '.') ?></p>
        <p><strong>Status:</strong> <?= $reservation['status'] ?></p>
        <p><strong>Data:</strong> <?= $reservation['created_at'] ?></p>
    </div>

</div>

</body>
</html>