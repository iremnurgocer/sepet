<?php
// src/Models/Cart.php

class Cart {
    private $items;

    public function __construct() {
        $this->items = [];
    }

    public function addProduct($productId, $quantity) {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] += $quantity;
        } else {
            $this->items[$productId] = ['quantity' => $quantity];
        }
    }

    public function removeProduct($productId) {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    public function getItems() {
        return $this->items;
    }
}
?>