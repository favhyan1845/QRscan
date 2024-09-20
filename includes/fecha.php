<?php 
class Fecha{
    
    
    static public function getHoyString(){
        $hoy = new DateTime();
        $hoy->setTimezone(new DateTimeZone('America/New_York'));
        return $hoy->format('Y-m-d H:i:s');
    }
    
    static public function getCurrentYear(){
        $hoy = new DateTime();
        $hoy->setTimezone(new DateTimeZone('America/New_York'));
        return $hoy->format('Y');
    }
    
    static public function getCurrentNumberMonth(){
        $hoy = new DateTime();
        $hoy->setTimezone(new DateTimeZone('America/New_York'));
        return $hoy->format('m');
    }
    
    static public function  getAnio($fechaString){
        return substr($fechaString, 0, 4);
    }
    
    static public function  getMes($fechaString){
        return Fecha::getDescripcionMes(substr($fechaString, 5, 2));
    }
    
    static public function  getDia($fechaString){
        return substr($fechaString, 8, 2);
    }
    
    static public function getDescripcionMes($mes){
        switch ($mes){
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
            case 3:
                return 'Marzo';
                break;
            case 4:
                return 'Abril';
                break;
            case 5:
                return 'Mayo';
                break;
            case 6:
                return 'Junio';
                break;
            case 7:
                return 'Julio';
                break;
            case 8:
                return 'Agosto';
                break;
            case 9:
                return 'Septiembre';
                break;
            case 10:
                return 'Octubre';
                break;
            case 11:
                return 'Noviembre';
                break;
            case 12:
            case 0:
                return 'Diciembre';
                break;
        }
    }
    
}
?>