<?php
namespace controllers;

class UserController {

    public $tamplate;
    public $title;

    public function __construct () {
        $this->tamplate = 'Default';
        $this->title = 'User page';
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
