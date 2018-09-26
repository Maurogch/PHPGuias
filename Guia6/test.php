<?php
require_once "Config/Autoload.php";

use Config\Autoload as Autoload;
use Repository\UserRepository as UserRepository;

Autoload::Start();

$a = new UserRepository();

//var_dump($a);