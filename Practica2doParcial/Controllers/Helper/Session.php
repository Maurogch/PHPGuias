<?php

namespace Controllers\Helper;

class Session
{
    public static function userLogged()
    {
        if(!isset($_SESSION["userLogged"]))
        {
            echo "<script>alert('Debe estar loggeado primero')</script>";
            echo "<script>window.location.replace('".FRONT_ROOT."Account/index')</script>";
            exit;
        }
    }
}