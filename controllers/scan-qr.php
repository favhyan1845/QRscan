<?php 
                
function scan_qr_ink($atts = [], $content = null, $tag = ''){
        ob_start();
        require_once plugin_dir_path(SCAN_PLUGIN_PATH.' ').'/view/scan-qr.php';
        return ob_get_clean();
        
}

