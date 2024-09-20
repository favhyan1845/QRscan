<?php
/******
 *Clase donde se encuentran las funciones a la db
* @return array******/

class Data_Store{
    /******
     *Funcion Lista las urls en la vista listado urls lenguaje
     * @return array******/
    
    /******
     *Funcion que realiza busqueda dentro de la db
     * @return array******/
    public function scan($locale){        
        echo 'llego a search';
    }
    
    /******
     *Funcion que trae el nombre de la tabla
     * @return array******/
    private function get_table_name(){       
        global $wpdb;
        return  "wp_engane";
    }
    
}
