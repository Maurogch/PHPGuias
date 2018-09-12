<?php
    namespace Model;
    
    class Person{
        private $lastName;
        private $firstName;

        public function getLastName(){
            return $this->lastname;
        } 

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }
    }
?>