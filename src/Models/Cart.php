<?php
// src/Models/Cart.php

class Cart {
    private $products;

    public function __construct() {
        $this->products = [];
    }

    public function addProduct($productId) {
        $this->products = $productId;
        return $productId;
    }
    public function getProducts(){
        return $this->products;
    }

    public function getCardProducts($id=array()) {
        $json = file_get_contents(__DIR__ . '/../../data/products.json');
        $json=mb_convert_encoding($json, 'ISO-8859-9', 'UTF-8');

        $products = json_decode($json, true);

        foreach ($id as $sessionID => $productID){
            if(empty($productID)){
                continue;
            }
            foreach ($products as $key => $product){

                if($product["id"]==$productID){

                    $Products[] = $product;
                }
            }

        }
        return $Products;
    }
}
?>
