<?php

namespace dao;
use Models\Client as Client;

interface IClientDao
{
    public function add(Client $client);
    public function getByDni($dni); 
    public function getAll(); 
}