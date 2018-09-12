<?php
    namespace Repository;

    use Model\Person as Person;
    
    interface IPersonRepository{
        function Add(Person $person);
    }
?>