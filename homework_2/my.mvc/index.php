<?php

use core\ClassLoader;
use core\Render;

require_once("core/ClassLoader.php");

try{
    ClassLoader::getInstance()->init();
}
catch (\Exception $error) {
    echo $error->getMessage();
}

try{
    $page = (new Render)->init();
}
catch (\Exception $error) {
    echo $error->getMessage();
}



