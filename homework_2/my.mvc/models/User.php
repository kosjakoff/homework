<?php

namespace models;
use \core\Database;

class User extends Database {
    
    protected function __construct() {
        
    }
    
    public static function getUser($userId) {
        return parent::getOne("SELECT * FROM users WHERE id = '$userId'");
    }
    
    public static function getUsers() {
        return parent::getAll("SELECT * FROM users");
    }
}
