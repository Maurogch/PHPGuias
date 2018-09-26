<?php
namespace Model;

use Model\Product as Product;

class Bill
{
    private $firstName;
    private $lastName;
    private $dni;
    private $email;
    private $dateBirth;
    private $billNumber;
    private $billType;
    private $productList = array();

    public function AddProduct (Product $product)
    {
        array_push($this->productList, $product);
    }

    public function SubTotalCost()
    {   
        $subtotal = 0;

        foreach ($this->productList as $value) {
            $subtotal += $value->getSubTotal();    
        }

        return $subtotal;
    }

    public function TotalCost()
    {
        $total = 0;

        foreach ($this->productList as $value) {
            $total += $value->getTotal();    
        }

        return $total;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getBillNumber()
    {
        return $this->billNumber;
    }

    public function setBillNumber($billNumber)
    {
        $this->billNumber = $billNumber;

        return $this;
    }

    public function getBillType()
    {
        return $this->billType;
    }

    public function setBillType($billType)
    {
        $this->billType = $billType;

        return $this;
    }

    public function getProductList()
    {
        return $this->productList;
    }

    public function setProductList($productList)
    {
        $this->productList = $productList;

        return $this;
    }
}
