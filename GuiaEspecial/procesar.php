<?php
    include_once("Argentino.php");
    include_once("Ingles.php");
    include_once("Portugues.php");

    $noPost = false;

    if($_POST){
        $idioma = isset($_POST["radioIdioma"]) ? $_POST["radioIdioma"] : "";
        $accion = isset($_POST["radioAccion"]) ? $_POST["radioAccion"] : "";
        $text = isset($_POST["textArea"]);

        switch($action){
            case : 
        }
    }
?>