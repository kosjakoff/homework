<?php

namespace models;

class Page {
    
    protected function __construct() {
        
    }
    
    public static function getContent() {
        return $page = [
            "title" => "Title of my.cms",
            "description" => "Description of...",
            "content" => "Content of this page..."
        ];
    }
    
    public static function getById($pageId) {
        return $page = [
            "title" => "Page_" . $pageId,
            "description" => "Description of Page_" . $pageId,
            "content" => "Content of Page_" . $pageId
        ];
    }
    
    public static function getAll() {
        return $pages = [
            [
                "id" => 1,
                "title" => "Title of Page_1"
            ],
            [
                "id" => 2,
                "title" => "Title of Page_2"
            ],
            [
                "id" => 3,
                "title" => "Title of Page_3"
            ],
        ];
    }
}
