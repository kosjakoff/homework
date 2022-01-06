<?php
namespace controllers;

class PageController {

    public function __construct() {
    
    }
    
    public function index():array {
        $result = \models\Page::getContent();
        return $result;
    }
    
    public function getAll():array {
        $result = \models\Page::getAll();
        return($result);
    }
    
    public function getPage($pageId):array {
        $result = \models\Page::getById($pageId);
        return($result);
    }
}
