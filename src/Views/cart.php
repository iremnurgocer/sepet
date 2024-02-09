<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet</title>
    <link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Sepetiniz</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ürün</th>
            <th scope="col">Adet</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Ýþlem</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product']['name']); ?></td>
                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                <td><?php echo htmlspecialchars($item['product']['price']); ?> TL</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="removeFromCart(<?php echo $item['product']['id']; ?>)">Kaldýr</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="../../public/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
