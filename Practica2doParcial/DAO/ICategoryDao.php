<?php
namespace DAO;

use Models\Category as Category;

interface ICategoryDao
{
    public function add(Category $category);
    public function getById($idCategory);
    public function getByName($categoryName);
    public function getAll();
    public function delete($idCategory);
}