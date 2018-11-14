<?php
namespace Controllers;

use DAO\CategoryDao as CategoryDao;
use DAO\ProductDao as ProductDao;
use Models\Product as Product;
use Models\Category as Category;
use Controllers\Helper\Session as Session;
use Exception as Exception;

class ProductController
{
    private $categoryDao;
    private $productDao;

    public function __construct()
    {
        Session::userLogged();
        $this->categoryDao = new CategoryDao();
        $this->productDao = new ProductDao();
    }

    public function index()
    {
        try{
            $categoryList = $this->categoryDao->getAll();
            
            if(empty($categoryList)){
                echo "<script>alert('Debe ingresar al menos una categoría primero')</script>";
                echo "<script>window.location.replace('".FRONT_ROOT."Category/index')</script>";
                exit;
            }
            
            $productList = $this->productDao->getAll();
            
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }
        
        require VIEWS_PATH."product.php";
    }

    public function add($productName,$stock,$price,$idCategory)
    {
        try{
            if(is_null($this->productDao->getByName($productName))){
                $category = $this->categoryDao->getById($idCategory);

                $product = new Product();

                $product->setProductName($productName);
                $product->setStock($stock);
                $product->setPrice($price);
                $product->setCategory($category);

                $this->productDao->add($product);

                echo "<script> alert('Producto agregado exitosamente');</script>";
            }else{
                echo "<script> alert('El producto ya existe');</script>";
            }
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }

        $this->index();
    }

    public function delete($idProduct)
    {
        try{    
            $this->productDao->delete($idProduct);
            echo "<script>alert('Producto borrado');</script>";
        }catch(Exception $ex){
            echo "<script> alert('" . str_replace(array("\r","\n","'"), "", $ex->getMessage()) . "');</script>";
        }

        $this->index();
    }
}