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
        <?php foreach ($Products as $id => $item){ ?>
            <tr>
                <td><a href="product_detail?id=<?= $item["id"] ?>"><?php echo $item['name'] ?></a></td>
                <td><?php echo 1; ?></td>
                <td><?php echo $item['price']; ?> TL</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="removeFromCart(<?php echo $item['id']; ?>)">Kaldýr</button>
                </td>
            </tr>
        <?php } ?>
        <?php if(!empty($Products)){ ?>
        <tr>
            <td>
                <button class="btn btn-sm btn-danger" onclick="clearCart()">Sepeti Temizle</button>
            </td>
        </tr>
        <?php } else{ ?>
            <tr>
                <td>
                    <a href="/" class="btn btn-lg btn-light">Sepetinize Ürün Ekleyin!</a>
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
            url: "/removeFromCart", // Rotanýzý güncellediðinizden emin olun
            type: "POST",
            data: {
                productId: productId
            },
            success: function (response) {
                alert("Çýkarýldý!");
                window.location.href = "/card";
            }
        });
    }
    function clearCart(){
        $.ajax({
            url: "/clearCart", // Rotanýzý güncellediðinizden emin olun
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
