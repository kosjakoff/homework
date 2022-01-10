<?php
namespace controllers;

class PageController {

    public function __construct() {
    
    }
    
    public function index():array {
        $result = \models\Page::getContent(1);
        return $result;
    }
        
    public function getPage($pageId):array {
        $result = \models\Page::getContent($pageId);
        return $result;
    }
    
    public function getPages():array {
        $result = \models\Page::getPages();
        return($result);
    }
    
}
