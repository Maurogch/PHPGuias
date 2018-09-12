<?php
    namespace Repository;

    use Model\Person as Person;
    use Repository\IPersonReposirory as IPersonRepository;
    
    class PersonRepository implements IPersonRepository{
        private $personList = array();

        public function Add(Person $person){ //forces Person as a parameter
            array_push($personList, $person);
        }
    }
?>