
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

}
?>

