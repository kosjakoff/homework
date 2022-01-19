<?php

namespace controllers;

class Error {
    
    public $tamplate;
    public $title;
    
    public function __construct () {
        //$this->tamplate = 'Default';
        $this->title = 'Error';
    }
    
    public function error_404() {
        return "Page not Found!";
    }
}
