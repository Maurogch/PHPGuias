<?php
    namespace Classes;

    class User{
        private $user;
        private $password;

        public function getUser(){
            return $this->email;
        }

        public function setUser($user){
            $this->user = $user;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

    }
?>