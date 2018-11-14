<?php
namespace Controllers;

use dao\ClientDao as ClientDao;
use dao\CategoryDao as CategoryDao;
use Controllers\Helper\Session as Session;
use Models\Client as Client;
use Exception as Exception;

class ClientController
{
    private $clientDao;
    private $categoryDao;

    public function __construct()
    {
        Session::userLogged();
        $this->clientDao = new ClientDao();
        $this->categoryDao = new CategoryDao();
    }

    public function index()
    {
        try{
            $clientList = $this->clientDao->getAll();
            
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }

        require VIEWS_PATH."client-list.php";
    }

    public function viewAddClient()
    {
        try{
            $categoryList = $this->categoryDao->getAll();
            
            if(empty($categoryList)){
                echo "<script> alert('No hay categorías ingresadas, Contacte a su administrador');</script>";
            }
            
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }

        require VIEWS_PATH."client-add.php";
    }

    public function add($categoryId,$lastName,$firstName,$dni,$email,$address)
    {
        try{
            if(is_null($this->clientDao->getByDni($dni)))
            {
                $category = $this->categoryDao->getById($categoryId);

                $client =  new Client();

                $client->setLastName($lastName);
                $client->setFirstName($firstName);
                $client->setDni($dni);
                $client->setEmail($email);
                $client->setAddress($address);
                $client->setCategory($category);

                $this->clientDao->add($client);
            }else{
                echo "<script> alert('El cliente ya existe');</script>";
                $this->viewAddClient();
            }
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }

        $this->index();
    }

    public function delete($dni)
    {
        try{    
           
            $deleted = $this->clientDao->delete($dni);

            if($deleted == 1){
                echo "<script>alert('Cliente borrado');</script>";
            }else{
                echo "<script>alert('Cliente no existente');</script>";
            }
            
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }

        $this->index();
    }

}