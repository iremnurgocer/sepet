<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-9">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>
    <link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/style.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-light">
    <div class="container">
        <h1><p class="link"><?php echo $product['name']; ?></p></h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link link" href="/">ANASAYFA</a></li>
                <li class="nav-item"><a class="nav-link link" href="/cart">SEPET</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container mt-5">
    <div class="row  row-cols-2">

        <div class="col-md-4">
            <div >
                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['author']; ?></p>
            <h5>İÇERİK</h5>
            <p><?php echo $product['detail']; ?></p>
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addToCart(<?php echo $product['id']; ?>)">Sepete Ekle</button>
                    </div>
                    <small class="text-muted"><?php echo $product['price']; ?> TL</small>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-light text-center py-4 mt-4">
    <div class="container">
        <p>&copy; 2024 My Website. All rights reserved.</p>
    </div>
</footer>
<script src="../../public/js/bootstrap/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function addToCart(productId) {

        $.ajax({
            url: "/addToCart",
            type: "GET",
            data: {
                productId: productId
            },
            success: function (response) {
                alert("Sepete eklendi!")
            }
        });
    }
</script>
</body>
</html>

