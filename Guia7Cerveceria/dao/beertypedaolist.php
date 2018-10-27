<?php
    namespace DAO;

    use Models\BeerType as BeerType;

    class BeerTypeDAOList implements IBeerTypeDao
    {
        private $beerTypeList;

        public function __construct()
        {
            if(!isset($_SESSION["BeerTypeList"]))
                $_SESSION["BeerTypeList"] = array();
            
            $this->beerTypeList = &$_SESSION["BeerTypeList"];
        }

        public function Add(BeerType $beerType)
        {
            array_push($this->beerTypeList, $beerType);            
        }

        public function GetAll()
        {
            try
            {
                return $this->beerTypeList;
            }
            catch(Exception $e)
            {
                throw $e;
            }
        }

        public function GetByCode($beerTypeCode)
        {
            try
            {
                $beerType = null;

                foreach($this->beerTypeList as $aux)
                {
                    if($aux->getBeerTypeCode() == $beerTypeCode)
                    {
                        $beerType = $aux;
                        break;
                    }
                }

                return $beerType;
            }
            catch(Exception $e){
                throw $e;
            }
        }

        public function GetByBeerTypeCode($beerTypeCode)
        {
            try
            {
                $result = null;

                foreach($this->beerTypeList as $beerType)
                {
                    if($beerType->getBeerTypeCode() == $beerTypeCode)
                    {
                        $result = $beerType;
                        break;
                    }
                }

                return $result;
            }
            catch(Exception $e)
            {
                throw $e;
            }
        }

        public function Delete($beerTypeCode)
        {
            try
            {
                $i = 0;

                foreach($this->beerTypeList as $beerType)
                {
                    if($beerType->getBeerTypeCode() == $beerTypeCode)
                    {
                        unset($this->beerTypeList[$i]);
                        break;
                    }

                    $i++;
                }

                $this->beerTypeList = array_values($this->beerTypeList);
            }
            catch(Exception $e)
            {
                throw $e;
            }
        }
    }
?>