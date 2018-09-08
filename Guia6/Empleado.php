<?php
    require_once ("Persona.php");

    class Empleado extends Persona{
        protected $legajo;
        protected $fechaInicio;
        protected $hrsTrabajoxDia;
        protected $pagaxHora;

        public function __construct($dni, $nombre, $apellido, $email, $fechaNacimiento, $legajo, $fechaInicio, $hrsTrabajoxDia, $pagaxHora){
            parent::__construct($dni, $nombre, $apellido, $email, $fechaNacimiento);
            $this->setLegajo($legajo);
            $this->setFechaInicio($fechaInicio);
            $this->setHrsTrabajoxDia($hrsTrabajoxDia);
            $this->setPagaxHora($pagaxHora);
        }

        public function getLegajo(){
            return $this->legajo;
        }

        public function getFechaInicio(){
            return $this->fechaInicio;
        }

        public function getHrsTrabajoxDia(){
            return $this->hrsTrabajoxDia;
        }

        public function getPagaxHora(){
            return $this->pagaxHora;
        }

        public function setLegajo($legajo){
            $this->legajo = $legajo;
        }

        public function setFechaInicio($fechaInicio){
            $this->fechaInicio = $fechaInicio;
        }

        public function setHrsTrabajoxDia($hrsTrabajoxDia){
            $this->hrsTrabajoxDia = $hrsTrabajoxDia;
        }

        public function setPagaxHora($pagaxHora){
            $this->pagaxHora = $pagaxHora;
        }
    }
?>