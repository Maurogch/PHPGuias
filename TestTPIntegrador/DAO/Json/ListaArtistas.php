<?php
namespace DAO\Json;

use DAO\IDao as IDao;
use DAO\Json\Json as Json;
use DAO\SingletonDao as SingletonDao;
use Model\Artista as Artista;
use Dao\Json\JsonDecoder\JsonDecoder as JsonDecoder;

//require_once("vendor\karriere\json-decoder\src\JsonDecoder.php");

class ListaArtistas extends SingletonDao implements IDao
{
    private $listaArtistas = array();

    protected $file = "artistas.json";

    public function Add($object)
    {
        $this->listaArtistas = $this->RetrieveAll();
        array_push($this->listaArtistas, $object);
        json::Serilize($this->listaArtistas, $this->file);
    }

    public function Retrieve($var)
    {

    }

    public function RetrieveAll()
    {
        $jsonDecodedData = Json::Deserilize($this->file);
        $jsonDecoder = new JsonDecoder();

        //if(json_decode($jsonDecodedData)!=array()){ //deserilise to know if it's an array, but time consuming
        if($jsonDecodedData[0]!="["){                 //check if first character of the json string is a [ to know if it's an array, much less time consuming
            $artistas[] = $jsonDecoder->decode($jsonDecodedData, Artista::class);
        }else{
            $artistas = $jsonDecoder->decodeMultiple($jsonDecodedData, Artista::class);
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
