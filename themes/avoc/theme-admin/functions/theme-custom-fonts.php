<?php

/*-----------------------------------------------------------------------------------

	CUSTOM FONTS

-----------------------------------------------------------------------------------*/


function sr_theme_fonts_register() {
	global $sr_prefix;
	$sr_fonts = array( 'bodyfont','h1font','h2font','h3font','h4font','h5font','h6font','subtitle','navigationfont','navigationsubfont','buttonfont');
    $fonts_url = '';
    
   /* Translators: If you want to deactivate the google font, just set this to false */
    $sr_googleFonts = true;
 
 
    if ( $sr_googleFonts ) {
        $sr_font_families = array();
 		
		$sr_active_fonts = array();
		$sr_active_weights = array();
		foreach($sr_fonts as $font) {
			$family = get_option($sr_prefix.'_'.$font.'-font');	
			$weight = get_option($sr_prefix.'_'.$font.'-weight');	
			$boldweight = get_option($sr_prefix.'_'.$font.'-boldweight');
			
			if ($family) {	
				if(!in_array($family, $sr_active_fonts) && $family ) {
					$sr_active_fonts[] = $family;
				}
				if (!array_key_exists($family, $sr_active_weights)) {
					$sr_active_weights[$family] = $weight;
					if($weight !== $boldweight && $boldweight) {
						$sr_active_weights[$family] .= ','.$boldweight;
					} 
				} else {
					$check = $sr_active_weights[$family];
					if(strpos($check,$weight) === false) {
						$sr_active_weights[$family] .= ','.$weight;
					}
					$check = $sr_active_weights[$family];
					if(strpos($check,$boldweight) === false && $boldweight) {
						$sr_active_weights[$family] .= ','.$boldweight;
					} 
				}
			}
		}
		
		foreach($sr_active_fonts as $f) {
			$sr_font_families[] = $f.':'.$sr_active_weights[$f];
		} 

        $query_args = array(
            'family' => urlencode( implode( '|', $sr_font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
	
		return $fonts_url;
}



function sr_theme_fonts_enqueue() {
    wp_enqueue_style( 'sr_fonts', sr_theme_fonts_register(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'sr_theme_fonts_enqueue' );

?>