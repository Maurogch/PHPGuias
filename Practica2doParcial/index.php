<?php
require_once "Config/config.php";
require_once "Config/autoload.php";

use Config\autoload as Autoload;
use Config\request as Request;
use Config\router as Router;

Autoload::Start();

session_start();

require VIEWS_PATH."header.php";
require VIEWS_PATH."navbar.php";
Router::Route(new Request());
require VIEWS_PATH."footer.php";

