<?php
    require_once("Idioma.php");

    class Portugues extends Idioma{
        public function Saludar(){
            return "Ola";
        }

        public function Despedirse(){
            return "Adeus";
        }
    }
?>