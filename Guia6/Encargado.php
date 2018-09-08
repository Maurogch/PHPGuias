<?php
    include_once("Empleado.php");

    class Encargado extends Empleado{
        private $numArea;

        public function __construct($dni, $nombre, $apellido, $email, $fechaNacimiento, $legajo, $fechaInicio, $hrsTrabajoxDia, $pagaxHora, $numArea){
            parent::__construct($dni, $nombre, $apellido, $email, $fechaNacimiento, $legajo, $fechaInicio, $hrsTrabajoxDia, $pagaxHora);
            $this->setNumArea($numArea);
        }

        public function getNumArea(){
            return $this->numArea;
        }

        public function setNumArea($numArea){
            $this->numArea = $numArea;
        }
    }
?>