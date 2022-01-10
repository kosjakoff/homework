<?php

namespace core;

class Database{
    
    protected static $instance;
    protected static $dbConnect;
    
    
    protected function __construct(){
        self::$dbConnect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

        if(!self::$dbConnect){
            throw new \Exception("There isn't connection to database!"); 
        }
        if(!mysqli_select_db(self::$dbConnect, DATABASE)){
            throw new \Exception("No table!"); 
        }
    }
    
    public static function getInstance(){
	    if (self::$instance === null) {
            self::$instance = new self();   
        }
	    return self::$instance;
    }
    
    public function getAll($sql){
        $result = mysqli_query(self::$dbConnect, $sql); 
        
        if(!$result){
            return array();
        }
        else{
            while ($row = mysqli_fetch_assoc($result)) {
                $resultRows[] = $row;
            }
        }
        
        return $resultRows;
    }
    
    public function getOne($sql){
        $result = mysqli_query(self::$dbConnect, $sql); 
        
        if(!$result){
            return array();
        }
        else{
            return mysqli_fetch_assoc($result);
        }
    }  
}

