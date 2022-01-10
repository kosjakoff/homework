<?php
namespace controllers;

class UserController {

    public function __construct() {
    
    }
    
    public function getUser($userId):array {
        $result = \models\User::getUser($userId);
        return $result;
    }
    
    public function getUsers():array {
        $result = \models\User::getUsers();
        return($result);
    }
    
}
