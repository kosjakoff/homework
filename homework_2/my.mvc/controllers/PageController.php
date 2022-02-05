<?php
namespace controllers;

class PageController {
    
    public function __construct () {
    
    }
    
    public function index(): bool {
        
        $data['title'] = 'All Pages';
        
        if ($data['query'] = \models\Page::getPage(1)) {
            
            require_once("views/header.php");
            require_once("views/index.php");
            require_once("views/sidebar.php");
            require_once("views/footer.php");
        
            return true ;
        }
        
        return false ;   
    }
        
    public function showPage($pageId): bool {
        
        $data['title'] = 'Page' . $pageId;
        
        if ($data['query'] = \models\Page::getPage($pageId)) {
            
            require_once("views/header.php");
            require_once("views/showPage.php");
            require_once("views/footer.php");
        
            return true;
        }
    
        return false;
    }
    
    public function showPages(): bool {
        
        $data['title'] = 'Home Page';
        
        if ($data['query'] = \models\Page::getPages()) {
            
            require_once("views/header.php");
            require_once("views/showPages.php");
            require_once("views/footer.php");
        
            return true;
        }
    
        return false;
    }
}
