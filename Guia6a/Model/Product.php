<?php

namespace Model;

class Product
{
    private $name;
    private $quantity;
    private $price;

    public function getSubTotal() //this should throw an error if quantity is 0
    {
        return $this->quantity * $this->price;
    }

    public function getTotal()
    {
        $total = $this->getSubTotal();

        if ($this->quantity >= 10) {
            $total += $total * 15 / 100;
            return $total;
        } else if ($this->quantity >= 5) {
            $total += $total * 10 / 100;
            return $total;
        } else {
            return $total;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
