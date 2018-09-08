<?php
    require_once("Funciones.php");

    class Personal implements Funciones{
        private $personalArray = array();

        public function ListarPersona($tipoEmp){ //recorrer el arreglo y devolver un arreglo con solo los objetos empleado que correspondan al tipo
            $array = array();

            foreach($personalArray as $item){ 
                if($item === $tipoEmp) array_push($array, $item);
            }
            
            return $array;
        }

        public function Agregar($empleado){ //agregar al arreglo de personal
            array_push($personalArray, $empleado); //necesita un check de tipo antes de agregar?
        }

        public function Eliminar($legajo){ //eliminar empleado del arreglo a base del legajo
            $exito = false;

            foreach($peronalArray as $key => $value){
                if($value->getLegajo()==$legajo){
                    array_splice($peronalArray, $key, 1); //borra del array posicion seguido de cauntos (1 en este caso), re indexa keys
                }
            }

            return $exito; // devuleve true or false en caso de haber podido eliminarlo
        }

        public function BuscarEmpleado($legajo){ // devuelve empleado a base de legajo
            $empleado = new Empleado();

            foreach($personalArray as $item){
                if($item->getLegajo == $legajo) $empleado = $item;
            }

            return $empleado;
        }

        public function ConsultarSueldoPersonal($tipoEmp){ //no se bien que pide acá
            return null; 
        }


    }
?>