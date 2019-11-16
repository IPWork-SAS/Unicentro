<?php    
    include 'db.php'; 
    class Evento extends DB{
        
        public function getEventos($id_locacion){
            $query = $this->connect()->prepare('SELECT * FROM eventos WHERE id_locacion = :id_locacion');
            $query->execute(['id_locacion' => $id_locacion]);            
            return $query;
        }

        public function getFechaUltimaEntrada() {
            $query = $this->connect()->query('SELECT * FROM eventos ORDER BY id DESC LIMIT 1')->fetch();             
            $fecha =  $query['fecha_creacion'];
            return $fecha; 
        }
    }
?>