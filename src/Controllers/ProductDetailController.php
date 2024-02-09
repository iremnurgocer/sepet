
<?php
// src/Controllers/ProductController.php

require_once __DIR__ . '/../Models/Detail.php';

class ProductDetailController {
    private $productModel;

    public function __construct($id) {
        $this->productModel = new Detail($id);
    }

    public function Detail() {
        $product = $this->productModel->getProduct();
        require_once __DIR__ . '/../Views/detail.php';
    }

    public function showProduct($productId) {
        $products = $this->productModel->getProduct();
        $product = null;
        foreach ($products as $p) {
            if ($p['id'] == $productId) {
                $product = $p;
                break;
            }
        }
        if ($product) {
            require_once __DIR__ . '/../Views/product_detail.php';
        } else {
            // �r�n bulunamad�ysa hata sayfas�n� g�ster
            header('HTTP/1.0 404 Not Found');
            echo "�r�n bulunamad�!";
            exit();
        }
    }

    // ... Di�er �r�n i�lemleri
}
?>

