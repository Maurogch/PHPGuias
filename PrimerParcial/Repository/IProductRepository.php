<?php

namespace Repository;

interface IProductRepository
{
    public function Add($item);
    public function Delete($productCode);
    public function GetAll();
}
