<?php
namespace dao;

interface IUserDao
{
    public function getByEmail($email);
}