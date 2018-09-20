<?php

    define("ROOT", dirname(__DIR__)); //crear constante ROOT con el root del proyecto

    spl_autoload_register(function ($className)
    {
        $fileName = str_replace("\\", "/", ROOT."/".$className.".php"); //str_replace para que remplace en path las barras inversas, para problemas en linux
        
        require_once($fileName);
    });    
?>