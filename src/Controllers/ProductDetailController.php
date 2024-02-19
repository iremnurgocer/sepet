
<?php
// src/Controllers/ProductController.php

require_once __DIR__ . '/../Models/Detail.php';

class ProductDetailController {
    private $productModel;

    public function __construct($id) {
        $this->productModel = new Detail($id);
    }

    public function detail() {
        $product = $this->productModel->getProduct();
        require_once __DIR__ . '/../Views/detail.php';
    }

}
?>

