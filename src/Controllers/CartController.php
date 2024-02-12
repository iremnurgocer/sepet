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
        // Ekleme iþleminden sonra ana ürün listesine yönlendir
        header('Location: /?page=products');
        exit();
    }

    public function removeFromCart($productId) {
        $this->CardModel->removeProduct($productId);
        $_SESSION['cart'] = $this->CardModel;
        // Çýkarma iþleminden sonra sepet sayfasýna yönlendir
        header('Location: /?page=cart');
        exit();
    }

    public function addToCartAjax() {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];

        $this->CardModel->addProduct($productId, $quantity);
        $_SESSION['cart'] = $this->CardModel;

        // JSON formatýnda bir cevap döndür
        echo json_encode(['success' => true, 'message' => 'Ürün sepete eklendi']);
    }

    public function viewCart() {
        $items = $this->CardModel->getItems();
        require_once __DIR__ . '/../Views/cart.php';
    }

    // ... Diðer sepet iþlemleri
}
