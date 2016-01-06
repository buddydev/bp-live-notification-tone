<?php

/* Plugin Name: BuddyPress Live Notification Tone
 * Plugin URI: http://buddydev.com/plugins/buddypress-live-notification/
 * Version: 1.0.0
 * Description: Used with BuddyPress Live Notification plugin. Notify user by playing sound
 * Author: Ravi Sharma (BuddyDev)
 * Author URI: http://buddydev.com/
 * License: GPL
 * Last Modified: January 6, 2016
 * 
 * */
Class BP_Live_Notification_Tone_Helper {
    
    private static $instance;
    private $base_url;
    
    private function __construct() {
		 
		$this->base_url = plugin_dir_url( __FILE__ );
		 
        $this->setup();
    }
    
    public static function get_instance() {
        
        if ( ! isset( self::$instance ) ) {
            
            self::$instance = new self();
            
        }
        
        return self::$instance;
        
    }
    
    private function setup() {
       
        add_action( 'bp_enqueue_scripts', array( $this, 'load_js') );
        
    }
    /**
	 * Load Js
	 * 
	 */
    public function load_js() {
        
		if ( ! is_user_logged_in() ) {
			return ;
		}
		
        wp_register_script( 'ion-sound-js', $this->base_url . 'assets/js/ion.sound.min.js' );
        wp_register_script( 'bp-live-notification-tone-js', $this->base_url . 'assets/js/bp-live-notification-tone.js', array( 'ion-sound-js', 'jquery' ) );
        
		$data = array( 'url' => $this->base_url );
		
        wp_localize_script( 'bp-live-notification-tone-js', 'plugin_url_live_notification_tone', $data );
        wp_enqueue_script( 'bp-live-notification-tone-js' );
        
    }
    
}
BP_Live_Notification_Tone_Helper::get_instance();


