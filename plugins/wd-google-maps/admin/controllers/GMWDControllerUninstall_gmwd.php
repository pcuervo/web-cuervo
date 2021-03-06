<?php

class GMWDControllerUninstall_gmwd extends GMWDController{
	////////////////////////////////////////////////////////////////////////////////////////
	// Events                                                                             //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constants                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Variables                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constructor & Destructor                                                           //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Public Methods                                                                     //
	////////////////////////////////////////////////////////////////////////////////////////
	public function uninstall(){
		global $wpdb;
	
		// delete tables
		
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_maps");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_markers");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_markercategories");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_polygons");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_circles");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_rectangles");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_polylines");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_options");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_themes");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_shortcodes");
		$wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "gmwd_mapstyles");
        
        // delete options
        delete_option('gmwd_do_activation_set_up_redirect');
        delete_option('gmwd_version');
        delete_option('gmwd_download_markers');
        delete_option('gmwd_pro');

		$this->view->complete_uninstalation();

	}		
	////////////////////////////////////////////////////////////////////////////////////////
	// Getters & Setters                                                                  //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Private Methods                                                                    //
	////////////////////////////////////////////////////////////////////////////////////////
	
	
	////////////////////////////////////////////////////////////////////////////////////////
	// Listeners                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
}