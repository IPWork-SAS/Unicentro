<?php 
    include 'db.php';    
    class DatosCampania extends DB{

        public function getDatosCampania($nombre_campania, $id_evento, $columnas, $fecha_inicial, $fecha_final) {
            $sql = "SELECT ". $columnas ." FROM " . $nombre_campania . " WHERE id_evento = ".$id_evento." AND fecha_creacion BETWEEN '". $fecha_inicial . "' AND '". $fecha_final ."'";
            $query = $this->connect()->prepare($sql);  
            $query->execute();          
            return $query; 
        }

        public function getFechaUltimaEntrada($nombre_campania, $id_evento) {
            $sql = "SELECT * FROM " . $nombre_campania . " WHERE id_evento = ".$id_evento ." ORDER BY id ASC LIMIT 1";
            $query = $this->connect()->query($sql)->fetch();             
            $fecha =  $query['fecha_creacion'];
            return $fecha; 
        }

        public function getDatabaseName($nombre_campania) {
            $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '".$nombre_campania. "'";
            $query = $this->connect()->prepare($sql);  
            $query->execute(); 
            $query = $query->fetch(); 
            $nombre_base_datos = $query['TABLE_SCHEMA'];         
            return $nombre_base_datos;          
        }

        public function getCamposTabla($nombre_tabla) {
            $sql = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = '".$this->db."' AND TABLE_NAME = '".$nombre_tabla."';";
            $query = $this->connect()->query($sql)->fetchAll();  

            $max = sizeof($query);
            $array = array();
            for ($i=0; $i < $max; $i++) {                 
                $array[] = $query[$i][0];
            }
                  
            return $array;          
        }

        public function getDatosCampaniaArray($nombre_campania, $id_evento, $columnas, $fecha_inicial, $fecha_final) {
            $sql = "SELECT ". $columnas ." FROM " . $nombre_campania . " WHERE id_evento = ".$id_evento." AND fecha_creacion BETWEEN '". $fecha_inicial . "' AND '". $fecha_final ."'";
            $query = $this->connect()->query($sql)->fetchAll();            
            return $query;    
        }
    }
?>