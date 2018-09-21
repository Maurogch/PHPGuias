<?php
    namespace Model;

    class Student
    {
        private $lastName;
        private $firstName;

        public function getLastName()
        {
            return $this->lastName;
        }

        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        public function getfirstName()
        {
            return $this->firstName;
        }

        public function setfirstName($firstName)
        {
            $this->firstName = $firstName;
        }
    }
?>