<?php
namespace Repository;

use Repository\IProductRepository as IProductRepository;

class ProductRepository implements IProductRepository
{
    private $productList = array();

    public function Add($product)
    {
        $unique = true;

        if ($product != null) {
            foreach ($this->productList as $productItem) {
                if ($product->getProductCode() == $productItem->getProductCode()) {
                    $unique = false;
                    break;
                }
            }
        }

        if ($unique == true) {
            array_push($this->productList, $product);
        }
        return $unique;
    }

    public function Delete($productCode)
    {
        $deleted = false;
        if ($productCode != null) {
            foreach ($this->productList as $key => $productItem) {
                if ($productCode == $productItem->getProductCode()) {
                    array_splice($this->productList, $key, 1);
                    $deleted = true;
                    break; //breaks foreach, as it has already deleted the product, and there no need to keep looping
                }
            }
        }
        return $deleted;
    }

    public function GetAll()
    {
        return $this->productList;
    }
}
