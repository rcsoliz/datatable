<?php 
    class connect{
        public function conection(){
            $conection = mysqli_connect(
                'localhost', 
                'root', 
                '', 
                'juegos');

            $conection->set_charset('utf8');
            
            return $conection;
        }
    }


?>