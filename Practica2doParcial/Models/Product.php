<?php

namespace Models;

use Models\Category as Category;

class Product
{
    private $idProduct;
    private $productName;
    private $stock;
    private $price;
    private $category; //Class Category

	public function getIdProduct()
	{
		return $this->idProduct;
	}

    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

	public function getProductName()
	{
		return $this->productName;
	}

    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

	public function getStock()
	{
		return $this->stock;
	}

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

	public function getprice()
	{
		return $this->price;
	}

    public function setprice($price)
    {
        $this->price = $price;

        return $this;
    }

	public function getCategory()
	{
		return $this->category;
	}

    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}