<?php
    namespace Controllers;

    use \Exception as Exception;
    use DAO\BeerDAOPDO as BeerDaoPdo;
    use DAO\BeerTypeDAOPDO as BeerTypeDaoPDO;
    use DAO\BeerDaoList as BeerDaoList;
    use DAO\BeerTypeDaoList as BeerTypeDaoList;
    use Models\Beer as Beer;
    use Models\BeerType as BeerType;

    class BeerController
    {
        private $beerDAO;
        private $beerTypeDAO;

        public function __construct()
        {
            // $this->beerDAO = new BeerDaoList();
            $this->beerDAO = new BeerDaoPdo();
            $this->beerTypeDAO = new BeerTypeDaoPDO();
            // $this->beerTypeDAO = new BeerTypeDaoList();
        }

        public function ShowAddView($message = "")
        {
            try
            {
                if(!empty($message))
                {
                    echo '<script type="text/javascript">alert("'.$message.'");</script>';
                }

                $beerTypeList = $this->beerTypeDAO->GetAll();

                if(count($beerTypeList) <= 0 )
                {
                    $message = 'No se encontraron Tipos de Cerveza.\nEs necesario que ingrese nuevos Tipos para agregar Cervezas.';
                    echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                    require_once(VIEWS_PATH."add-beertype.php");
                }
                else
                {
                    require_once(VIEWS_PATH."add-beer.php");
                }
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar mostrar la Pagina.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }


        public function ShowListView()
        {
            try
            {
                $beerList = $this->beerDAO->GetAll();

                require_once(VIEWS_PATH."beer-list.php");
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar mostrar la Pagina.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }

        public function Add($beerCode, $name, $beerTypeCode, $description, $density, $origin, $price)
        {
            try
            {
                $beer = new Beer();
                $beer->setBeerCode($beerCode);
                $beer->setName($name);
                $beer->setDescription($description);
                $beer->setDensity($density);
                $beer->setOrigin($origin);
                $beer->setPrice($price);

                $beerType = $this->beerTypeDAO->GetByCode($beerTypeCode);
                $beer->setBeerType($beerType);

                if($this->beerDAO->GetByBeerCode($beer->getBeerCode()) == null)
                {
                    $this->beerDAO->Add($beer);
                    $message = "Cerveza agregada con éxito";
                }
                else
                    $message = "Ya existe la Cerveza que intenta ingresar";

                $this->ShowAddView($message);
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar agregar la Cerveza.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }

        public function Delete($beerCode)
        {
            try
            {
                $this->beerDAO->Delete($beerCode);

                $this->ShowListView();
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar eliminar la Cerveza.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }

        public function ShowException(){
            try
            {
                $message = "";

                $this->beerDAO->ShowException();
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema de tipo Exception.\n Consulte a su Administrador.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }
    }
?>