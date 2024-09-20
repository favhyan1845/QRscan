<?php 

class Urls{

    
    public $esp;
    public $active;
    
    public $novedades = array();
    
    public function __construct() {
    }
    
    public function scan($url = null){    
            require_once plugin_dir_path(SCAN_PLUGIN_PATH.' ').'/includes/data/class-datastore.php';             
                $response = Data_Store::scan($url);
                return $response;
                
    }

    
}


