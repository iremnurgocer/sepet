<?php
// src/Controllers/CartController.php

require_once __DIR__ . '/../Models/Cart.php';

session_start();

class CartController {
    private $CardModel;

    public function __construct() {
        $this->CardModel = new Cart();
    }

    public function addToCart($productId, $quantity = 1) {
        $this->CardModel->addProduct($productId, $quantity);
        $_SESSION['cart'] = $this->CardModel;
        // Ekleme i�leminden sonra ana �r�n listesine y�nlendir
        header('Location: /?page=products');
        exit();
    }

    public function removeFromCart($productId) {
        $this->CardModel->removeProduct($productId);
        $_SESSION['cart'] = $this->CardModel;
        // ��karma i�leminden sonra sepet sayfas�na y�nlendir
        header('Location: /?page=cart');
        exit();
    }

    public function addToCartAjax() {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];

        $this->CardModel->addProduct($productId, $quantity);
        $_SESSION['cart'] = $this->CardModel;

        // JSON format�nda bir cevap d�nd�r
        echo json_encode(['success' => true, 'message' => '�r�n sepete eklendi']);
    }

    public function viewCart() {
        $items = $this->CardModel->getItems();
        require_once __DIR__ . '/../Views/cart.php';
    }

    // ... Di�er sepet i�lemleri
}
