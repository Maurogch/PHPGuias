<?php
namespace Repository;

use Repository\IFuncionesPersonal as IFuncionesPersonal;
use Model\Empleado as Empleado;

class RepositorioPersonal implements IFuncionesPersonal
{
    private $listaPersonal;

    public function __construct(){
        $this->listaPersonal = array();
    }
    public function GetAll(){
        return $this->listaPersonal;
    }

    public function ListarPersonal(Empleado $tipoEmp)
    { //recorrer el arreglo y devolver un arreglo con solo los objetos empleado que correspondan al tipo
        $array = array();

        foreach ($this->listaPersonal as $item) {
            if ($item === $tipoEmp) {
                array_push($array, $item);
            }

        }

        return $array;
    }

    public function Agregar(Empleado $empleado)
    { //agregar al arreglo de personal
        if ($empleado != null) {
            array_push($this->listaPersonal, $empleado);
        }

    }

    public function Eliminar($legajo)
    { //eliminar empleado del arreglo a base del legajo
        $exito = false;

        foreach ($this->listaPersonal as $key => $value) {
            if ($value->getLegajo() == $legajo) {
                array_splice($this->listaPersonal, $key, 1); //borra del array posicion seguido de cauntos (1 en este caso), re indexa keys
                $exito = true;
            }
        }

        return $exito; // devuleve true or false en caso de haber podido eliminarlo
    }

    public function BuscarEmpleado($legajo)
    { // devuelve empleado a base de legajo
        $empleado = new Empleado();

        foreach ($this->listaPersonal as $item) {
            if ($item->getLegajo == $legajo) {
                $empleado = $item;
            }

        }

        return $empleado;
    }

    public function ConsultarSueldoPersonal(Empleado $tipoEmp)
    { //devolver el gasto de todos los empleados de un tipo por dia?
        $total = 0.0;

        foreach ($this->listaPersonal as $value) {
            if ($value === $tipoEmp) {
                $total += $value->SueldoXDia();
            }

        }

        return $total;
    }
}
