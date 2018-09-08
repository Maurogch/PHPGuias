<?php
    require_once("Empleado.php");

    class JefeDepartamento extends Empleado{
        private $numDepto;

        public function __construct($dni, $nombre, $apellido, $email, $fechaNacimiento, $legajo, $fechaInicio, $hrsTrabajoxDia, $pagaxHora, $numDepto){
            parent::__construct($dni, $nombre, $apellido, $email, $fechaNacimiento, $legajo, $fechaInicio, $hrsTrabajoxDia, $pagaxHora);
            $this->setNumDepto($numDepto);
        }

        public function getNumDepto(){
            return $this->numDepto;
        }

        public function setNumDepto($numDepto){
            $this->numDepto = $numDepto;
        }

        public function Agregar(){ //no se que se pide acá

        }

        public function Eliminar($legajo){ //no se que se pide acá

        }

        public function AjustarSueldo($legajo, $pagaxHora){ // no se por qué este metodo está acá

        }
    }
?>