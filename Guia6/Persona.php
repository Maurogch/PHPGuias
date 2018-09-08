<?php
    class Persona{
        protected $dni;
        protected $nombre;
        protected $apellido;
        protected $email;
        protected $fechaNacimiento;

        public function __construct($dni, $nombre, $apellido, $email, $fechaNacimiento){
            $this->setDni($dni);
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setEmail($email);
            $this->setFechaNacimiento($fechaNacimiento);
        }

        public function getDni(){
            return $this->dni;
        }
        
        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setFechaNacimiento($fechaNacimiento){
            $this->fechaNacimiento = $fechaNacimiento;
        }
    }
?>