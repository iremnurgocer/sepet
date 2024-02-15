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
        <h1><a href="/" class="link">ÜRÜNLER</a></h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link link" href="/">ANASAYFA</a></li>
                <li class="nav-item"><a class="nav-link link" href="/cart">SEPET</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container mt-5">
    <div class="row">
        <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card mb-4 shadow-sm image-container" style="justify-content: center; align-items: center;">
                            <img src="<?php echo $product['image']; ?>" class="card-img-top zoomable-img" style="width: 200px; display: flex;" alt="<?php echo $product['name']; ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo $product['author']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="product_detail?id=<?= $product["id"] ?>" class="blogs-link">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Detay</button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addToCart(<?php echo $product['id']; ?>)">Sepete Ekle</button>
                                </div>
                                <small class="text-muted"><?php echo $product['price']; ?> TL</small>
                            </div>
                        </div>
                    </div>

                </div>


        <?php endforeach; ?>
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

