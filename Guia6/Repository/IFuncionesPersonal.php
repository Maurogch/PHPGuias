<?php
namespace Repository;

use Model\Empleado as Empleado;

interface IFuncionesPersonal
{
    public function ListarPersonal(Empleado $tipoEmp);
    public function Agregar(Empleado $empleado);
    public function Eliminar($legajo);
    public function BuscarEmpleado($legajo);
    public function ConsultarSueldoPersonal(Empleado $tipoEmp);
}
