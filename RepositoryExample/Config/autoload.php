<?php
    define("ROOT", dirname(__DIR__));    

    spl_autoload_register(function ($className)
    {
        $fileName = str_replace("\\", "/", ROOT."/".$className.".php");

        require_once($fileName);       
    });
?>