<?php

use core\ClassLoader;
use core\Database;
use \core\Route;

require_once("core/ClassLoader.php");
require_once("core/Config.php");

try{
    ClassLoader::getInstance()->init();
}
catch (\Exception $error) {
    echo $error->getMessage();
}

try{
    $dbConnection = Database::getInstance();
}
catch (\Exception $error) {
    echo $error->getMessage();
}

try{
    $page = Route::getInstance()->render();
}
catch (\Exception $error) {
    echo $error->getMessage();
}

