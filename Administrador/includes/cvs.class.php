<?php
    class CSV {
        
        public function generarCVS($nombre_campania, $datos_campania, $nombre_base_datos, $campos_tabla) {

            $campania_CSV[0] = $campos_tabla;

            $max_data_array = sizeof($datos_campania);
            $max_campos_tabla = sizeof($campos_tabla);

            
            for ($i=0; $i < $max_data_array; $i++) { 
                for ($j=0; $j < $max_campos_tabla; $j++) { 
                    $campania_CSV[$i+1][$j] = $datos_campania[$i][array_search($campos_tabla[$j], $campos_tabla)];        
                }                
            }           

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="'.$nombre_campania.'.csv"');

            $fp = fopen('php://output', 'wb');
            foreach ($campania_CSV as $line) {
                // though CSV stands for "comma separated value"
                // in many countries (including France) separator is ";"
                fputcsv($fp, $line, ';');
            }
            
            fclose($fp);	
        }
    }
?>