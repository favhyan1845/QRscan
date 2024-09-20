<?php
function scan_action() {
    
    require_once plugin_dir_path(CALCULATOR_PLUGIN_PATH.' ').'/includes/urls.php';
    
    $result = Urls::scan($url);
    
    $results['status']='success';
    $results['msg']='valor';
    if ($result != null){
        $results['status']='error';
        $results['msg']=$result;
    }
    echo json_encode($results);
    wp_die();
    
}