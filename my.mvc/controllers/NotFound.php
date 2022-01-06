<?php

namespace controllers;

class NotFound {
    
    private $page;
    
    public function __construct ($page = '') {
        $this->page = $page;
    }
    
    public function error_404() {
        return "Page not Found!";
    }
}
