<?php
    class Item{
        private $detalle;
        private $cantidad;
        private $precio;

        public function __construct($detalle, $cantidad, $precio){
            $this -> setDetalle($detalle);
            $this -> setCantidad($cantidad);
            $this -> setPrecio($precio);
        }

        public function getDetalle(){
            return $this -> detalle;
        }

        public function getCantidad(){
            return $this -> cantidad;
        }

        public function getPrecio(){
            return $this -> precio;
        }

        public function setDetalle($detalle){
            $this -> detalle = $detalle;
        }

        public function setCantidad($cantidad){
            $this -> cantidad = $cantidad;
        }

        public function setPrecio($precio){
            $this -> precio = $precio;
        }

        public function calcularPrecioTotal(){
            $total = $this->precio * $this->cantidad;

            if($this->cantidad >= 10){
                $total -= $total * 10 / 100;
            }else if($this->cantidad >= 5){
                $total -= $total * 5 / 100;
            }

            return $total;
        }
    }
?>