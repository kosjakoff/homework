<?php
namespace controllers;

class ProductController {

    public function __construct() {
    
    }
    
    public function getProduct($productId):array {
        $result = \models\Product::getProduct($productId);
        return $result;
    }
    
    public function getProducts():array {
        $result = \models\Product::getProducts();
        return($result);
    }
    
}
