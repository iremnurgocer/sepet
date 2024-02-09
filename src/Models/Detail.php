<?php
class Detail {
    private $product;

    public function __construct($id) {
        $this->loadProduct($id);
    }

    private function loadProduct($id) {
        $json = file_get_contents(__DIR__ . '/../../data/products.json');
        $json=mb_convert_encoding($json, 'UTF-8', 'ISO-8859-9');

        $products = json_decode($json, true);
        foreach ($products as $key => $product){
            if($product["id"]==$id){
                $this->product = $product;
            }
        }

    }

    public function getProduct() {
        return $this->product;
    }
}
?>
