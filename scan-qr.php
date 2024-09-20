<?php

/**
 * Plugin Name: Scan QR
 *
 * Version: 1.0.0
 *
 * Author: Favhtyan Horta
 *
 * Description: shortcodes: [scan-form];
 */

final class scan_qr {

    private static $instance;

    public static function instance(){
        if ( ! isset(self::$instance) && ! ( self::$instance instanceof scan_qr) ) {
        self::$instance = new scan_qr();
        spl_autoload_register( array( self::$instance, 'autoloader' ) );
        }

        return self::$instance;
    }

    public function __construct(){
        add_action( 'init', array( $this, 'init' ) );
    }
    public function init(){
        // register shortcode
        require_once dirname( __FILE__ ) . '/controllers/scan-qr.php';
        add_shortcode('scan-form', 'scan_qr_ink');

        //Registra los estilos
        wp_enqueue_style( 'bootstrap', plugins_url( '/vendor/bootstrap/css/bootstrap.min.css' , __FILE__ ));
        wp_enqueue_style( 'fontawesome', plugins_url( '/vendor/fontawesome/css/all.min.css' , __FILE__ ));
        wp_enqueue_style( 'scan-css', plugins_url( '/assets/css/index.css' , __FILE__ ));

        //Registra los JS
        wp_enqueue_script( 'bootstrap', plugins_url( '/vendor/bootstrap/js/bootstrap.bundle.min.js' , __FILE__ ), array( 'jquery' ),'1.0.0', true );
        // wp_enqueue_script( 'fontawesome', plugins_url( '/vendor/fontawesome/js/all.min.js' , __FILE__ ));
        wp_enqueue_script( 'datatables-js', plugins_url( '/vendor/datatables.js', __FILE__ ));
        wp_enqueue_script( 'index-js', plugins_url( 'assets/js/index.js', __FILE__ ));

        wp_enqueue_script( 'qrCode-js', plugins_url( 'assets/plugins/qrCode.min.js', __FILE__ ));


        //Enlaza el JS
        require_once dirname( __FILE__ ) . '/controllers/scan-action.php';


        // wp_localize_script( 'index-js', 'my_ajax_object',
        // array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
        // wp_localize_script( 'scan-js', 'my_ajax_object',
        // array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );


        add_action( 'wp_ajax_nopriv_scan_action', 'scan_action' );
        add_action( 'wp_ajax_scan_action', 'scan_action' );

        //Scan_activate();
        define( 'SCAN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
        define( 'PLUGIN_DIR', dirname(__FILE__).'/' );
    }
    public function autoloader( $class_name ){
    }
}


function scan_qr(){
    return scan_qr::instance();
}

scan_qr();