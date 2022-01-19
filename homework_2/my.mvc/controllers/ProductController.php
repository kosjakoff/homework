<?php
namespace controllers;

class ProductController {

    public $tamplate;
    public $title;
    
    public function __construct () {
        $this->tamplate = 'Default';
        $this->title = 'Product page';
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
