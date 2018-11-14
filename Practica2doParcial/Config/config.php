<?php namespace Config;

//define("ROOT", dirname(__DIR__) . "/");
define('ROOT', str_replace('\\','/',dirname(__DIR__) . "/"));


$base=explode($_SERVER['DOCUMENT_ROOT'],ROOT);
define("FRONT_ROOT",$base[1]);
//define("FRONT_ROOT", "/Lab2018/Guia5Ej1/Default Architecture Template/");
// define("FRONT_ROOT", "/UTN/MVC Example/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

define("DB_HOST", "localhost");
define("DB_NAME", "practica2doparcial");
define("DB_USER", "root");
define("DB_PASS", "");