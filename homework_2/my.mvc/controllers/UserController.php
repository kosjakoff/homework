<?php
namespace controllers;

class UserController {

    public function __construct () {

    }
    
    public function showUser($userId): bool {
        
        $data['title'] = 'User' . $userId;
        
        if ($data['query'] = \models\User::getUser($userId)) {
            
            require_once("views/header.php");
            require_once("views/showUser.php");
            require_once("views/footer.php");
        
            return true;
        }
        
        return false;
    }
    
    public function showUsers(): bool {

        $data['title'] = 'Users';
        
        if ($data['query'] = \models\User::getUsers()) {
            
            require_once("views/header.php");
            require_once("views/showUsers.php");
            require_once("views/footer.php");
        
            return true;
        }
        
        return false;
    }
    
}
