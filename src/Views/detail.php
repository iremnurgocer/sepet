<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>�r�nler</title>
    <link href="../../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/style.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-light">
    <div class="container">
        <h1><p class="link"><?php echo mb_convert_encoding(($product['name']), 'ISO-8859-9', 'UTF-8'); ?></p></h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link link" href="/">ANASAYFA</a></li>
                <li class="nav-item"><a class="nav-link link" href="/card">SEPET</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container mt-5">
    <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="<?php echo mb_convert_encoding($product['image'],'ISO-8859-9', 'UTF-8'); ?>" class="card-img-top" alt="<?php echo mb_convert_encoding(($product['name']), 'ISO-8859-9', 'UTF-8'); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo mb_convert_encoding(($product['name']), 'ISO-8859-9', 'UTF-8'); ?></h5>
                        <p class="card-text"><?php echo mb_convert_encoding($product['author'],'ISO-8859-9', 'UTF-8'); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Detay</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addToCart(<?php echo $product['id']; ?>)">Sepete Ekle</button>
                            </div>
                            <small class="text-muted"><?php echo mb_convert_encoding(($product['price']), 'ISO-8859-9', 'UTF-8'); ?> TL</small>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script src="../../public/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
