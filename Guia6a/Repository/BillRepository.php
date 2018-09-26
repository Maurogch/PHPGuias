<?php
namespace Repository;

use Repository\IActionsRepository as IActionsRepository;

class BillRepository implements IActionsRepository
{
    private $billRepositoryList = array();

    public function GetAll()
    {
        return $this->billRepositoryList;
    }

    public function Add($bill)
    {
        array_push($this->billRepositoryList, $bill);
    }
}

