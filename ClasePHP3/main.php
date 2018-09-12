<?php
    require_once("autoload.php");

    use Model\User as User;

    session_start(); //starting session to be able to use the variables stored in session

    if(!isset($_SESSION["userLogged"])) //check for session
        header("location:index.php?message=Error");   //redirects to index if main accesed directly
    else
        $user = isset($_SESSION["userLogged"]) ? $_SESSION["userLogged"] : new User;    

    if($user->getEmail() != "") echo "Bienvenido al Sistema ".$user->getEmail();
?>