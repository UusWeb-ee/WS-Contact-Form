<?php
/**
* Plugin Name: WS Contact Form
* Plugin URI: http://www.silvermuru.ee/en/wordpress/plugins/ws-contact-form/
* Description: Simple contact form for Wordpress
* Version: 1.0
* Author: WebShark
* Author URI: http://www.webshark.ee/
* Text Domain: ws-contact-form
**/

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class WS_Contact_Form {	
	public function __construct(){
		add_action( 'plugins_loaded', array( $this, 'ws_contact_form_load_textdomain' ) );
        add_action( 'plugins_loaded', array( $this, 'check_if_user_logged_in' ) );
        add_action( 'init', array( $this, 'ws_force_login_message_show' ) );
    }
    
    public function ws_contact_form_load_textdomain() {
        load_plugin_textdomain( 'ws-contact-form', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' ); 
	}    
}

if ( is_admin() ) {
    require plugin_dir_path( __FILE__ ) . '/admin/ws-contact-form-admin.php';
}
    
$wpse_ws_contact_form_plugin = new WS_Contact_Form();
?>