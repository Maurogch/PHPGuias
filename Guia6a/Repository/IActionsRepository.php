<?php
    namespace Repository;

    interface IActionsRepository{
        function Add($bill);
        function GetAll();
    }
?>