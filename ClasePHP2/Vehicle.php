<?php
    class Vehicle{
        public function TurnOn(){
            return "Turned On";
        }

        public function Accelerate(){
            return "Vehicle is accelerating";
        }

        public function SetSpeed($speed){
            return "Vehicle is running at ".$speed." kms/h";
        }

        public function SetPilots($pilot, $copilot){
            return "Pilot is ".$pilot." and copilot is ".$copilot;
        }
    }
?>