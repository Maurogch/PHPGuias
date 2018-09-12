<?php
    spl_autoload_register(function ($className) //use for loading all required_once classes
    {
        $fileName = $className.".php"; //recives the name of Model as className
        
        require_once($fileName);
    });
?>