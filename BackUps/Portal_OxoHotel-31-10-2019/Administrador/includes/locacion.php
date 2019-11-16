<?php 
    include 'db.php';   
    class Locacion extends DB{
        
        public function getLocaciones() {
            $query = $this->connect()->query('SELECT * FROM locaciones')->fetchAll();            
            return $query; 
        }

        public function getFechaUltimaEntrada() {
            $query = $this->connect()->query('SELECT * FROM locaciones ORDER BY id DESC LIMIT 1')->fetch();             
            $fecha =  $query['fecha_creacion'];
            return $fecha; 
        }
    }
?>