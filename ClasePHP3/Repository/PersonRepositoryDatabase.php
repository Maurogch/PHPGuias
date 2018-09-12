<?php
    namespace Repository;

    use Model\Person as Person;
    use Repository\IPersonReposirory as IPersonRepository;
    
    //Managed to make a new class for database using the interface
    class PersonRepositoryDatabase implements IPersonRepository{
        private $personList = array();

        public function Add(Person $person){
            array_push($personList, $person);
        }
    }
?>