<?php 

/*-----------------------------------------------------------------------------------

	Extended  WP Importer by SpabRice for custom navigations fields

-----------------------------------------------------------------------------------*/
global $sr_prefix;



/*-----------------------------------------------------------------------------------*/
/*	Import Function
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_theme_importoptions' ) ) {
	function sr_theme_importoptions($file) {
		global $sr_prefix;
		
		
		// ---------------------------------
		// Content Import
		// ---------------------------------

		// Include Custom Importer Class 
		include("wp-importer/wordpress-importer.php");
		
		// Import file
		$newimport = new SR_CUSTOM_WP_Import();
		$data = sanitize_file_name($file);
		$content_file = get_template_directory() . '/theme-admin/option-panel/importer/datas/'.$data.'.xml';
		if ( file_exists( $content_file ) ) {
			$newimport->fetch_attachments = true; ob_start();
			$newimport->import($content_file); ob_end_clean();				
		} else {
			wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=false' ) );
		}
		
		
				
		
		// ---------------------------------
		// Update Menu Location
		// ---------------------------------
		$nav_location = get_theme_mod( 'nav_menu_locations' ); 
		$menus = wp_get_nav_menus(); 
		
		// Assign Main Menu to location
		if( is_array($menus) ) {
			foreach($menus as $menu) { 
				if( $menu->name == 'Main Menu' ) { $nav_location['primary-menu'] = $menu->term_id; }
			}
		}
		set_theme_mod( 'nav_menu_locations', $nav_location );
		
		
		
		// ---------------------------------
		// Update Reading Settings
		// ---------------------------------
		$homePage 	= get_page_by_title( 'Home' );
		$blogPage = get_page_by_title( 'Blog' );
		if( isset($homePage->ID) && isset($blogPage->ID) ) {
			update_option('show_on_front', 'page');
			update_option('page_on_front',  $homePage->ID); 
			update_option('page_for_posts', $blogPage->ID); 
		}
		
		
		
		// ---------------------------------
		// Update Theme Options
		// ---------------------------------
		$option_file = get_template_directory() . '/theme-admin/option-panel/importer/datas/'.$file.'.txt';
		$options_content = file_get_contents( $option_file );
		$options = explode("|:|", $options_content);
		
		foreach ($options as $o) {
			$split_o = explode(";:;", $o);
			$name_o = $split_o[0];
			$val_o = $split_o[1];
			if ($val_o && $val_o !== '') { 
				$val = str_replace('SR_SITE_URL',home_url(),$val_o);
				update_option( $name_o, $val ); }
		}
		update_option( $sr_prefix.'_optiontree', $options_content );
		
		
		// Add option that the import has been done
		update_option( $sr_prefix.'_import_state', 'true' );
		
		
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Replace pagebuilder "|;|" by "\"
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'sr_theme_import_updatepagebuilder' ) ) {
	function sr_theme_import_updatepagebuilder() {
		global $sr_prefix;
			
		# Pages
		$pages = get_pages(); 
		foreach ( $pages as $page ) {
			$oldVal = get_post_meta($page->ID, $sr_prefix.'_pagebuilder_json', true);
			if (strpos($oldVal,'|;|') !== false) {
				$newVal = str_replace("|;|",'\\\\',$oldVal);
				update_post_meta($page->ID, $sr_prefix.'_pagebuilder_json', $newVal);
			}
		}
		
		# Posts
		$posts = get_posts( array('post_type' => 'post', 'posts_per_page' => -1) );
		foreach ( $posts as $post ) {
			$oldVal = get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true);
			if (strpos($oldVal,'|;|') !== false) {
				$newVal = str_replace("|;|",'\\\\',$oldVal);
				update_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', $newVal);
			}
		}
		
		# Portfolios
		$portfolios = get_posts( array('post_type' => 'portfolio', 'posts_per_page' => -1) );
		foreach ( $portfolios as $portfolio ) {
			$oldVal = get_post_meta($portfolio->ID, $sr_prefix.'_pagebuilder_json', true);
			if (strpos($oldVal,'|;|') !== false) {
				$newVal = str_replace("|;|",'\\\\',$oldVal);
				update_post_meta($portfolio->ID, $sr_prefix.'_pagebuilder_json', $newVal);
			}
		}
		
	}
}

?>