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

    public function getCartProducts($id=array()) {
        $json = file_get_contents(__DIR__ . '/../../data/products.json');
        $Products = array();
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
