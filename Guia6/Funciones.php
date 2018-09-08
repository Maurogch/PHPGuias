<?php
    require_once("JefeDepartamento.php");
    require_once("Encargado.php");

    interface Funciones{
        public function ListarPersonal($tipoEmp);
        public function Agregar($empleado);
        public function Eliminar($legajo);
        public function BuscarEmpleado($legajo);
        public function ConsultarSueldoPersonal($tipoEmp);
    }
?>