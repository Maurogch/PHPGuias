<?php
namespace Controllers;

use DAO\CategoryDao as CategoryDao;
use Models\Category as Category;
use Controllers\Helper\Session as Session;
use Exception as Exception;

class CategoryController
{
    private $categoryDao;

    public function __construct()
    {
        Session::userLogged();
        $this->categoryDao = new CategoryDao();
    }

    public function index()
    {
        try{
            $categoryList = $this->categoryDao->getAll();
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }
        
        require VIEWS_PATH."category.php";
    }

    public function add($categoryName)
    {
        try{
            if(is_null($this->categoryDao->getByName($categoryName))){
                $category = new Category();

                $category->setCategoryName($categoryName);

                $this->categoryDao->add($category);
                echo "<script>alert('Categoría agregada exitosamente');</script>";
            }else{
                echo "<script>alert('La categoría ya existe');</script>";
            }
            
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }
        $this->index();
    }

    public function delete($idCategory)
    {
        try{
            $this->categoryDao->delete($idCategory);
            echo "<script>alert('Categoría borrada');</script>";  
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }
        $this->index();
    }

}