<?php
    require_once("idioma.php");

    class Ingles extends Idioma{
        public function Saludar(){
            return "Hello";
        }

        public function Despedirse(){
            return "Goodbye";
        }
    }
?>