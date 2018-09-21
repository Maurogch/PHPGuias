<?php
    namespace DAO\Json;
    use DAO\IDao as IDao;
    use DAO\Json\Json as Json;
    use Model\Artista as Artista;

    class ListaArtistas implements IDao
    {
        private $listaArtistas = array();
        

        public function Add($object){
            array_push($this->listaArtistas, $object);
            $json = new Json();

            $json->Serilize($this->listaArtistas);

        }

        public function Retrieve($var){

        }

        public function RetrieveAll(){
            $json = new Json();
            $lista = $json->Deserilize();
            $this->listaArtistas = array();

            echo "esta deberia ser una lista vacia:";
            var_dump($listaArtistas);

            foreach ($lista as $key => $value) {
                $var = (Artista)$value[$key]; //falta castear
                array_push($listaArtistas, $var);
            }
            var_dump($listaArtistas);
            //return ;
        }

        public function Update($object){

        }

        public function Delete($var){

        }
    }
?>