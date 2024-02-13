<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet</title>
    <link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/style.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-light">
    <div class="container">
        <h1><a href="/" class="link">Sepet</a></h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link link" href="/">ANASAYFA</a></li>
                <li class="nav-item"><a class="nav-link link" href="/card">SEPET</a></li>
            </ul>
        </nav>
    </div>
</header>
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
        <?php $items = $Products;?>
        <?php foreach ($items as $id => $item){ ?>
            <tr>
                <td><?php echo htmlspecialchars(mb_convert_encoding($item['name'], 'ISO-8859-9', 'UTF-8')); ?></td>
                <td><?php echo htmlspecialchars(1); ?></td>
                <td><?php echo htmlspecialchars(mb_convert_encoding($item['price'], 'ISO-8859-9', 'UTF-8')); ?> TL</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="removeFromCart(<?php echo $item['product']['id']; ?>)">Kaldýr</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<footer class="bg-dark text-light text-center py-4 mt-4">
    <div class="container">
        <p>&copy; 2024 My Website. All rights reserved.</p>
    </div>
</footer>
<script src="../../public/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
