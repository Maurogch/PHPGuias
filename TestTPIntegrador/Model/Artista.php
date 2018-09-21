<?php
    namespace Model;

class Artista{
    private $nombre;
    private $apellido;

    public function __construct(){
        //to add
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
// implements JsonSerializable
    /*public function jsonSerialize(){ //nunca encontro auto inlcude el JsonSerilizable
        return 
        [
            'nombre'   => $this->getNombre(),
            'apellido' => $this->getApellido()
        ];
    }*/

    //The Bad
    public function toJson()
    {
        return json_encode([
            'artista' => [
                'nombre' => $this->getNombre(),
                'apellido' => $this->getApellido()
            ]
        ]);
    }
    

}

?>