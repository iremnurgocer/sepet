<?php
class Product {
    private $products;

    public function __construct() {
        $this->loadProducts();
    }

    private function loadProducts() {
        $json = file_get_contents(__DIR__ . '/../../data/products.json');
        $this->products = json_decode($json, true);

    }

    public function getAllProducts() {
        return $this->products;
    }

}
?>
