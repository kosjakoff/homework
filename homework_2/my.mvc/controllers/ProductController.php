<?php
namespace controllers;

class ProductController {

    public function __construct () {

    }
    
    public function showProduct($productId): bool {
        
        $data['title'] = 'Product' . $productId;
        
        if ($data['query'] = \models\Product::getProduct($productId)) {
            
            require_once("views/header.php");
            require_once("views/showProduct.php");
            require_once("views/footer.php");
        
            return true;
        }
        
        return false;
    }
    
    public function showProducts(): bool {
        
        $data['title'] = 'Product' . $productId;
        
        if ($data['query'] = \models\Product::getProducts()) {
            
            require_once("views/header.php");
            require_once("views/showProducts.php");
            require_once("views/footer.php");
        
            return true;
        }
        
        return false;
    }
    
}
