<?php

namespace models;
use \core\Database;

class Product extends Database {
    
    protected function __construct() {
        
    }
    
    public static function getProduct($productId) {
        return parent::getOne("SELECT * FROM product WHERE page_id = '$productId'");
    }
    
    public static function getProducts() {
        return parent::getAll("SELECT * FROM product");
    }
}
