<?php
namespace DAO\Json;

use DAO\IDao as IDao;
use DAO\Json\Json as Json;
use DAO\SingletonDao as SingletonDao;
use Model\Artista as Artista;
use Karriere\JsonDecoder\JsonDecoder as JsonDecoder;

class ListaArtistas extends SingletonDao implements IDao
{
    protected $file = "JsonFiles/artistas.json";

    /**
     * Retrieve list from file, and an object and then serilize it and store it again
     */
    public function Add($object)
    {
        $listaArtista = array();
        $listaArtistas = $this->RetrieveAll();
        array_push($listaArtistas, $object);
        json::Serilize($listaArtistas, $this->file);
    }

    public function Retrieve($var)
    {

    }

    /**
     * Returns a complete list of Artists stored in artists.json
     */
    public function RetrieveAll()
    {
        $jsonDecodedData = Json::Deserilize($this->file);
        $jsonDecoder = new JsonDecoder(true);         //true bool to access private atributes of class

        if(empty($jsonDecodedData)){ //if file was empty return empty array
            return array();
        }
        //if(json_decode($jsonDecodedData)!=array()){ //deserilize to know if it's an array, but time consuming
        if($jsonDecodedData[0]!="["){                 //check if first character of the json string is a [ to know if it's an array, much less time consuming
            $artistas[] = $jsonDecoder->decode($jsonDecodedData, Artista::class);
        }else{
            $artistas = $jsonDecoder->decodeMultiple($jsonDecodedData, Artista::class); //This will cast the required class to the object from json string
        }

        return $artistas;
    }

    public function Update($object)
    {

    }

    public function Delete($var)
    {

    }
}
