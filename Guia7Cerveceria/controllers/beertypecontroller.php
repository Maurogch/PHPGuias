<?php
    namespace Controllers;

    use DAO\BeerTypeDaoList as BeerTypeDaoList;
    use DAO\BeerDaoList as BeerDaoList;
    use DAO\BeerDaoPDO as BeerDaoPDO;
    use DAO\BeerTypeDaoPDO as BeerTypeDaoPDO;
    use Models\BeerType as BeerType;
    use Models\Beer as Beer;

    class BeerTypeController
    {
        private $beerTypeDAO;
        private $beerDAO;
        
        public function __construct()
        { 
            // $this->beerTypeDAO = new BeerTypeDaoList();
            // $this->beerDAO = new BeerDaoList();
            $this->beerTypeDAO = new BeerTypeDaoPDO();
            $this->beerDAO = new BeerDaoPDO();
        }

        public function ShowAddView($message = "")
        {
            if(!empty($message))
                { echo '<script type="text/javascript">alert("'.$message.'");</script>'; }
            
            require_once(VIEWS_PATH."add-beertype.php");
        }

        public function ShowListView()
        {
            try
            {
                $beerTypeList = $this->beerTypeDAO->GetAll();
                
                require_once(VIEWS_PATH."beertype-list.php");
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar mostrar la Pagina.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }

        public function Add($beerTypeCode, $name, $description, $recipe)
        {
            try
            {
                $beerType = new BeerType();
                $beerType->setBeerTypeCode($beerTypeCode);
                $beerType->setName($name);
                $beerType->setDescription($description);
                $beerType->setRecipe($recipe);

                if($this->beerTypeDAO->GetByBeerTypeCode($beerType->getBeerTypeCode()) == null)
                {
                    $this->beerTypeDAO->Add($beerType);
                    $message = "Tipo de Cerveza agregado con éxito";
                }
                else
                    $message = "Ya existe el Tipo de Cerveza que intenta ingresar";

                $this->ShowAddView($message);  
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar mostrar la Pagina.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }

        }

        public function Delete($beerTypeCode)
        {
            try
            {
                if(count($this->beerDAO->GetByTypeCode($beerTypeCode)) == 0 )
                {
                    $message = 'No se es posible Eliminar este Tipo de Cerveza ya que esta relacionado con al menos una Cerveza.';
                    echo '<script type="text/javascript">alert("'.$message.'");</script>';
                }
                else
                {
                    $this->beerTypeDAO->Delete($beerTypeCode);
                }

                $this->ShowListView();
            }
            catch(Exception $ex)
            {
                $message = 'Oops ! \n\n Hubo un problema al intentar mostrar la Pagina.\n Consulte a su Administrador o vuelva a intentarlo.';
                echo '<script type="text/javascript">confirm("'.$message.'");</script>';
                require_once(VIEWS_PATH."home.php");
            }
        }
    }
?>