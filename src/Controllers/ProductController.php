
<?php
// src/Controllers/ProductController.php

require_once __DIR__ . '/../Models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function listProducts() {
        $products = $this->productModel->getAllProducts();
        require_once __DIR__ . '/../Views/products.php';
    }

    public function showProduct($productId) {
        $products = $this->productModel->getAllProducts();
        $product = null;
        foreach ($products as $p) {
            if ($p['id'] == $productId) {
                $product = $p;
                break;
            }
        }
        if ($product) {
            require_once __DIR__ . '/../Views/products.php';
        } else {
            // Ürün bulunamadýysa hata sayfasýný göster
            header('HTTP/1.0 404 Not Found');
            echo "Ürün bulunamadý!";
            exit();
        }
    }

    // ... Diðer ürün iþlemleri
}
?>

