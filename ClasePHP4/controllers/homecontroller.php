<?php
    namespace Controllers;

    class HomeController
    {
        public function Index()
        {
            require_once(VIEWS_PATH."product-list.php");
        }

        public function Logout()
        {
            session_destroy();
            
            $this->Index();
        }
    }
?>