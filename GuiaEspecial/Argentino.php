<?php
    require_once("Idioma.php");

    class Argentino extends Idioma{
        public function Saludar(){
            return "Hola";
        }

        public function Despedirse(){
            return "Adios";
        }
    }
?>
