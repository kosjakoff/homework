<?php
namespace controllers;

class Error {
    
    public function __construct () {
    
    }
    
    public function error_404() {
        
        $data['title'] = 'Error';
        $data['message'] = "Page not Found!";
        
        require_once("views/header.php");
        require_once("views/error_404.php");
        require_once("views/footer.php");
        
    }
}
