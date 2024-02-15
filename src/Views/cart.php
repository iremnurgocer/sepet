<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-9">
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
            <th scope="col">işlem</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $totalPrice = 0;
        $uniqueItems = array();

        foreach ($Products as $id => $item) {
            if (!isset($uniqueItems[$item['id']])) {
                $uniqueItems[$item['id']] = $item;
                $uniqueItems[$item['id']]['quantity'] = 1;
            } else {
                $uniqueItems[$item['id']]['quantity']++;
            }

            $totalPrice += $item['price'];
        }

        foreach ($uniqueItems as $uniqueItem) {
            $subtotal = $uniqueItem['price'] * $uniqueItem['quantity'];
            ?>
            <tr>
                <td><a href="product_detail?id=<?= $uniqueItem["id"] ?>"><?php echo $uniqueItem['name'] ?></a></td>
                <td><?php echo $uniqueItem['quantity']; ?></td>
                <td><?php echo $subtotal; ?> TL</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="removeFromCart(<?php echo $uniqueItem['id']; ?>)">Kaldır</button>
                </td>
            </tr>
        <?php } ?>

        <?php if (!empty($uniqueItems)) { ?>
            <tr>
                <td>TOPLAM</td>
                <td><?php echo count($Products);?></td>
                <td><?php echo $totalPrice; ?> TL</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="clearCart()">Sepeti Temizle</button>
                </td>
            </tr>
        <?php } else { ?>
            <tr>
                <td>
                    <a href="/" class="btn btn-lg btn-light">Sepetinize ürün Ekleyin!</a>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function removeFromCart(productId) {
        $.ajax({
            url: "/removeFromCart",
            type: "POST",
            data: {
                productId: productId
            },
            success: function (response) {
                alert("Çıkarıldı!");
                window.location.href = "/card";
            }
        });
    }
    function clearCart(){
        $.ajax({
            url: "/clearCart",
            type: "POST",

            success: function (response) {
                alert("Sepet Temizlendi!");
                window.location.href = "/card";
            }
        });
    }
</script>
</body>
</html>
