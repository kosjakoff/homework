<?php

namespace models;
use \core\Database;

class Page extends Database {
    
    protected function __construct() {
        
    }
    
    public static function getPage($pageId) {
        return parent::getOne("SELECT * FROM pages WHERE id = '$pageId'");
    }
    
    
    public static function getPages() {
        return parent::getAll("SELECT * FROM pages");
    }
}
