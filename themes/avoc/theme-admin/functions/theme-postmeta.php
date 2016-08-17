<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add metaboxes
/*-----------------------------------------------------------------------------------*/

# Post types
function sr_add_meta_video() {  
    add_meta_box(  
        'meta_video', // $id  
        __('Video', 'sr_avoc_theme'), // $title  
        'sr_show_meta_video', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
}  
add_action('add_meta_boxes', 'sr_add_meta_video');

function sr_add_meta_audio() {  
    add_meta_box(  
        'meta_audio', // $id  
        __('Selfhosted Audio', 'sr_avoc_theme'), // $title  
        'sr_show_meta_audio', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
}  
add_action('add_meta_boxes', 'sr_add_meta_audio');

function sr_add_meta_medias() {  
    add_meta_box(  
        'meta_medias', // $id  
        __('Medias', 'sr_avoc_theme'), // $title  
        'sr_show_meta_medias', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
}  
add_action('add_meta_boxes', 'sr_add_meta_medias');


# Subtitle
function sr_add_meta_subtitle() {  
    add_meta_box(  
        'meta_subtitle', // $id  
        __('Page Hero / Page Title', 'sr_avoc_theme'), // $title  
        'sr_show_meta_subtitle', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	add_meta_box(  
        'meta_subtitle', // $id  
        __('Pagetitle / Hero', 'sr_avoc_theme'), // $title  
        'sr_show_meta_subtitle', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	add_meta_box(  
        'meta_subtitle', // $id  
        __('Pagetitle / Hero', 'sr_avoc_theme'), // $title  
        'sr_show_meta_subtitle', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority		
}  
add_action('add_meta_boxes', 'sr_add_meta_subtitle');

/*function sr_add_meta_quote() {  
    add_meta_box(  
        'meta_quote', // $id  
        __('Quote', 'sr_avoc_theme'), // $title  
        'sr_show_meta_quote', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
}  
add_action('add_meta_boxes', 'sr_add_meta_quote');

function sr_add_meta_link() {  
    add_meta_box(  
        'meta_link', // $id  
        __('Link', 'sr_avoc_theme'), // $title  
        'sr_show_meta_link', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
}  
add_action('add_meta_boxes', 'sr_add_meta_link');
*/

function sr_add_meta_portfoliocategories() {  
    add_meta_box(  
        'meta_portfoliocategories', // $id  
        __('Portfolio Settings', 'sr_avoc_theme'), // $title  
        'sr_show_meta_portfoliocategories', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority 
}  
add_action('add_meta_boxes', 'sr_add_meta_portfoliocategories');

function sr_add_meta_portfoliooptions() {  
    add_meta_box(  
        'meta_portfoliooptions', // $id  
        __('Portfolio Options', 'sr_avoc_theme'), // $title  
        'sr_show_meta_portfoliooptions', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority 
}  
add_action('add_meta_boxes', 'sr_add_meta_portfoliooptions');

if (get_option($sr_prefix.'_portfoliotype') == 'wolf') {
	function sr_add_meta_portfoliosingleoptions() {  
		add_meta_box(  
			'meta_portfoliosingleoptions', // $id  
			__('Portfolio Wolf Grid Appearance', 'sr_avoc_theme'), // $title  
			'sr_show_meta_portfoliosingleoptions', // $callback  
			'portfolio', // $page  
			'normal', // $context  
			'high'); // $priority 
	}  
	add_action('add_meta_boxes', 'sr_add_meta_portfoliosingleoptions');
}


/*-----------------------------------------------------------------------------------*/
/*	Define fields
/*-----------------------------------------------------------------------------------*/


/*  REVSLIDER */
$revolutionslider = array();
$revolutionslider[0] = array( "name" => __("No Slider", 'sr_avoc_theme'), "value" => "false");

if(class_exists('RevSlider')){
	
	$slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[] = array( "name" => $revSlider->getTitle(), "value" => $revSlider->getAlias());
	}
}
/*  REVSLIDER */


$sr_prefix = '_sr';  

$sr_meta_subtitle = array( 
	array(  
		"label" => __("Page Title Settings", 'sr_avoc_theme'),
	   	"desc" => __("Choose a settings for the Page Title", 'sr_avoc_theme'),
	    'id'    => $sr_prefix.'_showpagetitle',  
	    'type'  => 'select-hiding'  ,
		'option' => array( 
						array(	"name" => __("Default (no background)", 'sr_avoc_theme'), 
							  	"value"=> "default"),
						array(	"name" => __("Color Background", 'sr_avoc_theme'), 
							  	"value"=> "color"),
						array(	"name" => __("Image Background", 'sr_avoc_theme'), 
							  	"value"=> "image"),
						array(	"name" => __("Video Background", 'sr_avoc_theme'), 
							  	"value"=> "video"),
						array(	"name" => __("Avoc Slider", 'sr_avoc_theme'), 
							  	"value"=> "fullslider"),
						array(	"name" => __("Inline Video (youtube,vimeo)", 'sr_avoc_theme'), 
							  	"value"=> "inlinevideo"),
						array(	"name" => __("Revolution Slider", 'sr_avoc_theme'), 
							  	"value"=> "slider"),		
						array(	"name" => __("No Page Title", 'sr_avoc_theme'), 
							  	"value" => "false")
						)
	),
	
		// DEFAULT PAGE TITLE
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "default color image video",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Subtitle", 'sr_avoc_theme'),  
				'desc'  => __("Enter your subtitle for this page.  Leave it empty if you don't want do show any subtitle.", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_subtitle',  
				'type'  => 'title' ,
				'defaultsize' => 'h5' 
			),
			array(  
				'label' => __("Alternativ Main Title", 'sr_avoc_theme'),  
				'desc'  => __("If empty, it will take the post name.", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_alttitle',  
				'type'  => 'title',
				'defaultsize' => 'h1' 
			),
			array(  
				'label' => __("Ttitle Arrangement", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id'    => $sr_prefix.'_titlearrangement', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Subtitle at first/top", 'sr_avoc_theme'), 
							"value" => "sub"),
					array(	"name" => __("Main Title at first/top", 'sr_avoc_theme'), 
							"value" => "main")
					)
			),
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"type" => "hidinggroupend"
			),
			
						
		// COLOR BG	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "color",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "main",
				"desc" => 'Color Background<br>',
				'id'  => 'header-info'  ,
				'type'  => 'info'  
			),
			
			array(  
				'label' => __("Background Color", 'sr_avoc_theme'),  
				'desc'  => __("Choose a background for your page title", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_color_bgcolor',  
				'type'  => 'color', 
			),
			array(  
				'label' => __("Text Color", 'sr_avoc_theme'),  
				'desc'  => __("Choose Text color", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_color_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_avoc_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_avoc_theme'), 
							"value" => "dark")
					)
			),
		
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		// IMAGE BG	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "image",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "main",
				"desc" => 'Image Background<br>',
				'id'  => 'header-info'  ,
				'type'  => 'info'  
			),
		
			array(  
				'label' => __("Background Image", 'sr_avoc_theme'),  
				'desc'  => __("Add a background image for the section", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_image_bgimage',  
				'type'  => 'image', 
			),
			array(  
				'label' => __("Text Color", 'sr_avoc_theme'),  
				'desc'  => __("Choose Text color", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_image_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_avoc_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_avoc_theme'), 
							"value" => "dark")
					)
			),
			array(  
				'label' => __("Parallax Effect", 'sr_avoc_theme'),  
				'desc'  => __("Do you want to have a parallax effect?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_image_parallax', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Yes", 'sr_avoc_theme'), 
							"value" => "true"),
					array(	"name" => __("No", 'sr_avoc_theme'), 
							"value" => "false")
					)
			),
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		
		// VIDEO BG	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "video",	
		   	"type" => "hidinggroupstart"
		),
					
			array(  
				"label" => "main",
				"desc" => 'Video Background<br>',
				'id'  => 'header-info'  ,
				'type'  => 'info'  
			),
			
			array(  
				"label" => "main",
				"desc" => '<div class="sr_replacefield">Make sure to provide all 3 files (mp4,webm,ogv)</div>',
				'id'  => 'header-info'  ,
				'type'  => 'info'  
			),
			
			array(  
				'label' => __("MP4 file url", 'sr_avoc_theme'),  
				'desc'  => __("The url to the M4V file", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_mp4',  
				'type'  => 'video', 
			),
			array(  
				'label' => __("WEBM file url", 'sr_avoc_theme'),  
				'desc'  => __("The url to the WEBM file", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_webm',  
				'type'  => 'video', 
			),
			array(  
				'label' => __("OGV file url", 'sr_avoc_theme'),  
				'desc'  => __("The url to the OGV file", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_oga',  
				'type'  => 'video', 
			),
			array(  
				'label' => __("Video Width", 'sr_avoc_theme'),  
				'desc'  => __("Please enter the width of the video file", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_width',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("Video Height", 'sr_avoc_theme'),  
				'desc'  => __("Please enter the height of the video file", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_height',  
				'type'  => 'text', 
			),
			array(  
				'label' => __("Poster", 'sr_avoc_theme'),  
				'desc'  => __("This image will be shown for devices which don't support background video. Please make sure that this image has the same height than the video itself", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_poster',  
				'type'  => 'image', 
			),
			array(  
				'label' => __("Text Color", 'sr_avoc_theme'),  
				'desc'  => __("Choose Text color", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_avoc_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_avoc_theme'), 
							"value" => "dark")
					)
			),
			array(  
				'label' => __("Parallax Effect", 'sr_avoc_theme'),  
				'desc'  => __("Do you want to have a parallax effect?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_parallax', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Yes", 'sr_avoc_theme'), 
							"value" => "true"),
					array(	"name" => __("No", 'sr_avoc_theme'), 
							"value" => "false")
					)
			),
			array(  
				'label' => __("Overlay Color", 'sr_avoc_theme'),  
				'desc'  => __("Leave it empty if you don't want any overlay color", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_overlaycolor',  
				'type'  => 'color', 
			),
			array(  
				'label' => __("Overlay opacity", 'sr_avoc_theme'),  
				'desc'  => __("Choose the opacity for the overlay color", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_overlayopacity', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => "0.1", 
							"value" => "1"),
					array(	"name" => "0.2", 
							"value" => "2"),
					array(	"name" => "0.3", 
							"value" => "3"),
					array(	"name" => "0.4", 
							"value" => "4"),
					array(	"name" => "0.5", 
							"value" => "5"),
					array(	"name" => "0.6", 
							"value" => "6"),
					array(	"name" => "0.7", 
							"value" => "7"),
					array(	"name" => "0.8", 
							"value" => "8"),
					array(	"name" => "0.9", 
							"value" => "9")	
					)
			),
			array(  
				'label' => __("Sound", 'sr_avoc_theme'),  
				'desc'  => __("Do you want to activate the sound of the video?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_video_sound', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("No", 'sr_avoc_theme'), 
							"value" => "false"),
					array(	"name" => __("Yes", 'sr_avoc_theme'), 
							"value" => "true")
					)
			),
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
				
		// AVOC SLIDER	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "fullslider",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "main",
				"desc" => 'Avoc Slider',
				'id'  => 'header-info'  ,
				'type'  => 'info'  
			),
			
			array(  
				'label' => __("Slides", 'sr_avoc_theme'),  
				'desc'  => __("Add your slides", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_fullslider_slides',  
				'type'  => 'slides'  
			),
			
			array(  
					'label' => __("Navigation", 'sr_avoc_theme'),  
					'desc'  => __("What navigation do you want?", 'sr_avoc_theme'),  
					'id'    => $sr_prefix.'_fullslider_navigation',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("Arrows", 'sr_avoc_theme'), 
								"value" => "arrows"),
						array(	"name" => __("Bullets", 'sr_avoc_theme'), 
								"value" => "bullets"),
						array(	"name" => __("Both (Bullets & Arrows)", 'sr_avoc_theme'), 
								"value" => "both")
						)
				),
								
			array(  
					'label' => __("Autoplay", 'sr_avoc_theme'),  
					'desc'  => __("Should the slider start automatically", 'sr_avoc_theme'),  
					'id'    => $sr_prefix.'_fullslider_autoplay',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("No", 'sr_avoc_theme'), 
								"value" => "false"),
						array(	"name" => __("Yes", 'sr_avoc_theme'), 
								"value" => "true")
						)
				),
				
			array(  
					'label' => __("Loop", 'sr_avoc_theme'),  
					'desc'  => __("", 'sr_avoc_theme'),  
					'id'    => $sr_prefix.'_fullslider_loop',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("No", 'sr_avoc_theme'), 
								"value" => "false"),
						array(	"name" => __("Yes", 'sr_avoc_theme'), 
								"value" => "true")
						)
				),
		
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		// INLINE VIDEO
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "inlinevideo",	
		   	"type" => "hidinggroupstart"
		),
		
			array(  
				"label" => "main",
				"desc" => 'Inlinevideo<br>',
				'id'  => 'header-info'  ,
				'type'  => 'info'  
			),
		
			array(  
				'label' => __("Type", 'sr_avoc_theme'),  
				'desc'  => __("What type of video would you like to show. Youtube or Vimeo?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_inlinevideo_type',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Youtube", 'sr_avoc_theme'), 
							"value" => "youtube"),
					array(	"name" => __("Vimeo", 'sr_avoc_theme'), 
							"value" => "vimeo")
					)
			),
			array(  
				'label' => __("Video ID", 'sr_avoc_theme'),  
				'desc'  => __("Enter the video ID of your video", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_inlinevideo_id', 
				'type'  => 'text'
			),
			array(  
				'label' => __("Background Image", 'sr_avoc_theme'),  
				'desc'  => __("Add a background image.", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_inlinevideo_bgimage',  
				'type'  => 'image', 
			),
			array(  
				'label' => __("Text Color", 'sr_avoc_theme'),  
				'desc'  => __("Choose Text color", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_inlinevideo_textcolor', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Light", 'sr_avoc_theme'), 
							"value" => "light"),
					array(	"name" => __("Dark", 'sr_avoc_theme'), 
							"value" => "dark")
					)
			),
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
		
		// REVOLUTION SLIDER	
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"hiding" => "slider",	
		   	"type" => "hidinggroupstart"
		),
			array(  
				'label' => __("Select Revolution Slider", 'sr_avoc_theme'),
				'desc' => __("Choose a Slider. The Slider will replace the default page title.", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_slider_slider',  
				'type'  => 'select' ,
				'option' => $revolutionslider
			),
			array(  
				'label' => __("Hide Header", 'sr_avoc_theme'),  
				'desc'  => __("Do you want to hide the header <br>(logo / menu)?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_header_hide', 
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("No", 'sr_avoc_theme'), 
							"value" => "false"),
					array(	"name" => __("Yes", 'sr_avoc_theme'), 
							"value" => "true")
					)
			),
		array( 
			"id" => $sr_prefix."_showpagetitle",
		   	"type" => "hidinggroupend"
		),
		
			
		// HEIGHT OPTION
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "color image video fullslider inlinevideo",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Height", 'sr_avoc_theme'),  
				'desc'  => __("What height do you want for your hero section?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_pagetitleheight',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Full", 'sr_avoc_theme'), 
							"value" => "hero-full"),
					array(	"name" => __("Big (80%)", 'sr_avoc_theme'), 
							"value" => "hero-big"),
					array(	"name" => __("Half (50%)", 'sr_avoc_theme'), 
							"value" => "hero-half"),
					array(	"name" => __("Auto", 'sr_avoc_theme'), 
							"value" => "hero-auto")
					)
			),
		array( 
			"id" => $sr_prefix."_showpagetitle",
			"type" => "hidinggroupend"
		),
		
		// HEADER APPEARENCE
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "color image video fullslider inlinevideo slider",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Logo / Menu Appearance", 'sr_avoc_theme'),  
				'desc'  => __("Depending on your Hero, do you want a light or dark Logo/Menu appearance?", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_headerappearance',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Dark", 'sr_avoc_theme'), 
							"value" => "dark"),
					array(	"name" => __("Light", 'sr_avoc_theme'), 
							"value" => "light")
					)
			),
		array( 
			"id" => $sr_prefix."_showpagetitle",
			"type" => "hidinggroupend"
		),
			
		// Titel Position
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "color image video inlinevideo",	
				"type" => "hidinggroupstart"
			),	
			array(  
				'label' => __("Title Position", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id'    => $sr_prefix.'_pagetitleposition',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Default (Center Center)", 'sr_avoc_theme'), 
							"value" => "default"),
					array(	"name" => __("Top Left", 'sr_avoc_theme'), 
							"value" => "hleft vtop"),
					array(	"name" => __("Top Center", 'sr_avoc_theme'), 
							"value" => "vtop"),
					array(	"name" => __("Top Right", 'sr_avoc_theme'), 
							"value" => "hright vtop"),
					array(	"name" => __("Bottom Left", 'sr_avoc_theme'), 
							"value" => "hleft vbottom"),
					array(	"name" => __("Bottom Center", 'sr_avoc_theme'), 
							"value" => "vbottom"),
					array(	"name" => __("Bottom Right", 'sr_avoc_theme'), 
							"value" => "hright vbottom"),
					array(	"name" => __("Hide Title Text", 'sr_avoc_theme'), 
							"value" => "false")
					)
			),
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"type" => "hidinggroupend"
			),
			
			
			
		// Scroll-Down OPTION
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "color image video slider fullslider inlinevideo",	
				"type" => "hidinggroupstart"
			),
			
			array(  
					'label' => __("Scroll down Message", 'sr_avoc_theme'),  
					'desc'  => __("Do you want to display a message to scroll down?", 'sr_avoc_theme'),  
					'id'    => $sr_prefix.'_pagetitlescrolldown',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("No", 'sr_avoc_theme'), 
								"value" => "false"),
						array(	"name" => __("Light", 'sr_avoc_theme'), 
								"value" => "light"),
						array(	"name" => __("Dark", 'sr_avoc_theme'), 
								"value" => "dark")
						)
				),
			
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"type" => "hidinggroupend"
			),
			
		
		// MARGIN BOTTOM
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"hiding" => "color image video slider fullslider inlinevideo",	
				"type" => "hidinggroupstart"
			),
			
			array(  
					'label' => __("Bottom Margin", 'sr_avoc_theme'),  
					'desc'  => __("This adds a bottom margin/space between your hero and the content", 'sr_avoc_theme'),  
					'id'    => $sr_prefix.'_pagetitlemargin',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("Yes", 'sr_avoc_theme'), 
								"value" => "true"),
						array(	"name" => __("No", 'sr_avoc_theme'), 
								"value" => "false")
						)
				),
			
		array( 
				"id" => $sr_prefix."_showpagetitle",
				"type" => "hidinggroupend"
			)
 );



$sr_meta_medias = array(  
	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	
	array(  
	    'label' => __("Medias / Gallery", 'sr_avoc_theme'),  
	    'desc'  => __("Add images or embedded videos, then drag and drop to arrange them.", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_medias',  
	    'type'  => 'medias'  
	),
	
	array(  
		"label" => __("Gallery Layout (Single View)", 'sr_avoc_theme'),
	   	"desc" => __("If you choose 'List' the images will be displayed below each other instead of a slider.", 'sr_avoc_theme'),
	    'id'    => $sr_prefix.'_mediaslayout',  
	    'type'  => 'select'  ,
		'option' => array( 
						array(	"name" => __("Slider", 'sr_avoc_theme'), 
								"value" => "slider"),
						array(	"name" => __("List", 'sr_avoc_theme'), 
								"value"=> "list")
						) 
	)
 );

$sr_meta_audio = array(  
	
	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	
	array(  
		'label' => __("Audio", 'sr_avoc_theme'),  
	    'desc'  => __("Embedded Audio or Selfhosted?", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_audio',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Embedded Audio", 'sr_avoc_theme'), 
					"value" => "embedded"),
			array(	"name" => __("Selfhosted Audio", 'sr_avoc_theme'), 
					"value" => "selfhosted")
			)
	),
		
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "embedded",	
				"type" => "hidinggroupstart"
			),
				array(  
					"label" => __("Embedded Audio", 'sr_avoc_theme'),
					"desc" => __("Include the embedded iframe. (from soundcloud for example)", 'sr_avoc_theme'),
					'id'    => $sr_prefix.'_audio_embedded',  
					'type'  => 'textarea'  
				),
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "embedded",	
				"type" => "hidinggroupend"
			),
			
		
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
			),
				array(  
					"label" => __("MP3 File URL", 'sr_avoc_theme'),
					"desc" => __("The url to the mp3 file", 'sr_avoc_theme'),
					'id'    => $sr_prefix.'_audio_mp3',  
					'type'  => 'text'  
				),
				array(  
					"label" => __("OGA/OGG File URL", 'sr_avoc_theme'),
					"desc" => __("The url to the oga/ogg file", 'sr_avoc_theme'),
					'id'    => $sr_prefix.'_audio_oga',  
					'type'  => 'text'  
				),
				array(  
					'label' => __("Show Featured Image", 'sr_avoc_theme'),  
					'desc'  => __("Do you want to show the featured image above the player?", 'sr_avoc_theme'),  
					'id'    => $sr_prefix.'_audio_image',  
					'type'  => 'select', 
					'option' => array( 
						array(	"name" => __("No", 'sr_avoc_theme'), 
								"value" => "false"),
						array(	"name" => __("Yes", 'sr_avoc_theme'), 
								"value" => "true")
						)
				),
		array( 
				"id" => $sr_prefix."_audio",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupend"
			)
 );




$sr_meta_video = array(  

	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	
	array(  
		'label' => __("Video", 'sr_avoc_theme'),  
	    'desc'  => __("Embedded Video or Selfhosted?", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_video',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Embedded Video (iframe)", 'sr_avoc_theme'), 
					"value" => "embedded"),
			array(	"name" => __("Selfhosted Video", 'sr_avoc_theme'), 
					"value" => "selfhosted")
			)
	),
		
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "embedded",	
				"type" => "hidinggroupstart"
			),
			array(  
				"label" => __("Embedded Video", 'sr_avoc_theme'),
				"desc" => __("Include the embedded iframe.", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_video_embedded',  
				'type'  => 'textarea'  
			),
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "embedded",	
				"type" => "hidinggroupend"
			),
			
			
			
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
			),
			array(  
				"label" => __("M4V File URL", 'sr_avoc_theme'),
				"desc" => __("The url to the M4V file", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_video_m4v',  
				'type'  => 'video'  
			),
			array(  
				"label" => __("OGA/OGG File URL", 'sr_avoc_theme'),
				"desc" => __("The url to the oga/ogg file", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_video_oga',  
				'type'  => 'video'  
			),
			array(  
				"label" => __("WEBMV File URL", 'sr_avoc_theme'),
				"desc" => __("The url to the webmv file", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_video_webmv',  
				'type'  => 'video'  
			),
		array( 
				"id" => $sr_prefix."_video",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupend"
			)
 );


$sr_meta_quote = array(  
	array(  
		"label" => __("Quote", 'sr_avoc_theme'),
	   	"desc" => __("Enter the quote.", 'sr_avoc_theme'),
	    'id'    => $sr_prefix.'_quote',  
	    'type'  => 'textarea'  
	)
 );


$sr_meta_link = array(  
	array(  
		"label" => __("Link", 'sr_avoc_theme'),
	   	"desc" => __("Link url", 'sr_avoc_theme'),
	    'id'    => $sr_prefix.'_link',  
	    'type'  => 'text'  
	)
 );

 
 
 $sr_meta_portfoliocategories = array(  
	array(  
		"label" => __("Category", 'sr_avoc_theme'),
	   	"desc" => __("Choose the portfolio category you want to show for this page", 'sr_avoc_theme'),
	    'id'    => $sr_prefix.'_portfoliocategories',  
	    'type'  => 'portfoliocategories'  
	),
	array(  
		"label" => __("Show Filter", 'sr_avoc_theme'),
	   	"desc" => __("Do you want to show the Filter?", 'sr_avoc_theme'),
	    'id'    => $sr_prefix.'_portfoliofilter',  
	    'type'  => 'select-hiding'  ,
		'option' => array( 
						array(	"name" => __("Yes", 'sr_avoc_theme'), 
							  	"value" => "true"),
						array(	"name" => __("No", 'sr_avoc_theme'), 
							  	"value"=> "false")
						)
	),
		array( 
				"id" => $sr_prefix."_portfoliofilter",
				"hiding" => "true",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Display Option", 'sr_avoc_theme'),  
				'desc'  => '',  
				'id'    => $sr_prefix.'_portfoliofilteroption',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Display Filter on Scroll", 'sr_avoc_theme'), 
							"value" => "scroll"),
					array(	"name" => __("Always display Filter (on pageload)", 'sr_avoc_theme'), 
							"value" => "start")
					)
			),
		array( 
				"id" => $sr_prefix."_portfoliofilter",
				"type" => "hidinggroupend"
			)
 );
 
 
 $sr_meta_portfoliooptions = array(  
	array(  
		'label' => __("Go to", 'sr_avoc_theme'),  
	    'desc'  => __("Should your portfolio item open a lightbox or go to the item page", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_portfoliogoto',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Item Page (default)", 'sr_avoc_theme'), 
					"value" => "page"),
			array(	"name" => __("Custom Url", 'sr_avoc_theme'), 
					"value" => "custom"),
			array(	"name" => __("Lightbox Image", 'sr_avoc_theme'), 
					"value" => "image"),
			array(	"name" => __("Lightbox Video (youtube/vimeo)", 'sr_avoc_theme'), 
					"value" => "video"),
			array(	"name" => __("Lightbox Video (selfhosted/mp4)", 'sr_avoc_theme'), 
					"value" => "selfhosted")			
			)
	),
	
		array( 
				"id" => $sr_prefix."_portfoliogoto",
				"hiding" => "custom",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("URL", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id'    => $sr_prefix.'_portfoliogotourl',  
				'type'  => 'text'
			),
			array(  
				'label' => __("Target", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id'    => $sr_prefix.'_portfoliogototarget',  
				'type'  => 'select',
				'option' => array( 
					array(	"name" => __("Same Page", 'sr_avoc_theme'), 
							"value" => "_self"),
					array(	"name" => __("New Page", 'sr_avoc_theme'), 
							"value" => "_blank")
				)
			),
		array( 
			"id" => $sr_prefix."_portfoliogoto",
		   	"type" => "hidinggroupend"
			),
			
		array( 
				"id" => $sr_prefix."_portfoliogoto",
				"hiding" => "image",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Select Image", 'sr_avoc_theme'),  
				'desc'  => __("Select your image which will be opened in lightbox.", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_portfoliogotoimage',  
				'type'  => 'image'
			),
		array( 
			"id" => $sr_prefix."_portfoliogoto",
		   	"type" => "hidinggroupend"
			),
			
		array( 
				"id" => $sr_prefix."_portfoliogoto",
				"hiding" => "video",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Video URL", 'sr_avoc_theme'),  
				'desc'  => __("Make sure to enter the url which is provided on the embedded iframe code on 'src'<br><br>Example Vimeo: http://player.vimeo.com/video/VIMEOID<br><br>Example Youtube: http://www.youtube.com/embed/YOUTUBEID", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_portfoliogotovideo',  
				'type'  => 'text'
			),
		array( 
			"id" => $sr_prefix."_portfoliogoto",
		   	"type" => "hidinggroupend"
			),
			
		array( 
				"id" => $sr_prefix."_portfoliogoto",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Video file", 'sr_avoc_theme'),  
				'desc'  => __("Choose your video file from media library", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_portfoliogotoselfhosted',  
				'type'  => 'video'
			),
		array( 
			"id" => $sr_prefix."_portfoliogoto",
		   	"type" => "hidinggroupend"
			),
			
		array( 
				"id" => $sr_prefix."_portfoliogoto",
				"hiding" => "image video selfhosted",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Connect Items", 'sr_avoc_theme'),  
				'desc'  => __("Do you want to connect this item with other portfolio lighbox items?  If yes, navigation arrows will be added to the lightbox.", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_portfoliogotoconnect',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("No", 'sr_avoc_theme'), 
							"value" => "false"),
					array(	"name" => __("Yes", 'sr_avoc_theme'), 
							"value" => "true")			
					)
			),
		array( 
			"id" => $sr_prefix."_portfoliogoto",
		   	"type" => "hidinggroupend"
			),
 );
 

$sr_meta_portfoliosingleoptions = array(  
	array(  
		'label' => "",  
	    'desc'  => "",  
	    'id'    => "#02B6D9",  
		'type'  => 'accentborder'
	),
	array(  
		"label" => "main",
		"desc" => '<div class="sr_replacefield"><strong>These option only have impact if you choosed the Wolf Grid Option on your portfolio options.</strong><br>Here you can add some individual styling and layout options.</div>',
		'id'  => 'header-info',
		'type'  => 'info'  
	),
	array(  
		"label" => __("Alternative Caption Title", 'sr_avoc_theme'),
		"desc" => __("Use for example <strong>&lt;br&gt;</strong> to break the line. <br><strong>If empty, it will take the post name.</strong>", 'sr_avoc_theme'),
		'id'    => $sr_prefix.'_altcaption',  
		'type'  => 'text'  
	),
	array(  
		"label" => __("Individual Parallax Scroll Speed (optional)", 'sr_avoc_theme'),
		"desc" => __("Use a speed between <strong>'-2.0' and '+2.0'</strong><br><strong>Leave empty for a randomly assigned speed.</strong>", 'sr_avoc_theme'),
		'id'    => $sr_prefix.'_wolfspeed',  
		'type'  => 'text'  
	),
	
	array(  
		'label' => __("Item Size", 'sr_avoc_theme'),  
	    'desc'  => __("By default your item size is", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_wolfitemsize',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("Half", 'sr_avoc_theme'), 
					"value" => "whalf"),
			array(	"name" => __("Full", 'sr_avoc_theme'), 
					"value" => "wfull")		
			)
	),
	
		array( 
				"id" => $sr_prefix."_wolfitemsize",
				"hiding" => "wfull",	
				"type" => "hidinggroupstart"
			),
			array(  
				'label' => __("Image Position", 'sr_avoc_theme'),  
				'desc'  => __("Left or Right.  Your caption will automatically take the other side (if not static).", 'sr_avoc_theme'),  
				'id'    => $sr_prefix.'_wolfimageposition',  
				'type'  => 'select', 
				'option' => array( 
					array(	"name" => __("Left", 'sr_avoc_theme'), 
							"value" => "wleft"),
					array(	"name" => __("Right", 'sr_avoc_theme'), 
							"value" => "wright")		
					)
			),
		array( 
			"id" => $sr_prefix."_wolfitemsize",
		   	"type" => "hidinggroupend"
			),
	
	array(  
		'label' => __("Add Caption Offset", 'sr_avoc_theme'),  
	    'desc'  => __("Do you want to add some additional offset to your captions?", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_captionoffset',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("No", 'sr_avoc_theme'), 
					"value" => "false"),
			array(	"name" => __("Yes", 'sr_avoc_theme'), 
					"value" => "true")		
			)
	),
		
		array( 
				"id" => $sr_prefix."_captionoffset",
				"hiding" => "true",	
				"type" => "hidinggroupstart"
			),
			array(  
				"label" => __("Horizontal Offset (left / right)", 'sr_avoc_theme'),
				"desc" => __("Enter a value between <strong>'1' and '100'</strong>", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_captionhorizontaloffset',  
				'type'  => 'text'  
			),
			
			array(  
				"label" => __("Vertical Offset (top / bottom)", 'sr_avoc_theme'),
				"desc" => __("Enter a value between <strong>'1' and '100'</strong>", 'sr_avoc_theme'),
				'id'    => $sr_prefix.'_captionverticaloffset',  
				'type'  => 'text'  
			),
		array( 
			"id" => $sr_prefix."_captionoffset",
		   	"type" => "hidinggroupend"
		),
			
	array(  
		'label' => __("Caption Styling", 'sr_avoc_theme'),  
	    'desc'  => __("Do you want to add some styling to your captions?", 'sr_avoc_theme'),  
	    'id'    => $sr_prefix.'_captionstyling',  
		'type'  => 'select-hiding', 
		'option' => array( 
			array(	"name" => __("No", 'sr_avoc_theme'), 
					"value" => "false"),
			array(	"name" => __("Yes", 'sr_avoc_theme'), 
					"value" => "true")		
			)
	),
		
		array( 
				"id" => $sr_prefix."_captionstyling",
				"hiding" => "true",	
				"type" => "hidinggroupstart"
			),
	
			array(  
				"label" => __("Caption Border Color", 'sr_avoc_theme'),
				"desc" => "Leave empty if you don't want any border",
				'id'    => $sr_prefix.'_captionborder',  
				'type'  => 'color'  
			),
			array(  
				"label" => __("Caption Background Color", 'sr_avoc_theme'),
				"desc" => "Leave empty for a transparent background",
				'id'    => $sr_prefix.'_captionbackground',  
				'type'  => 'color'  
			),
			array(  
				"label" => __("Text Color", 'sr_avoc_theme'),
				"desc" => "Leave empty for the default dark color",
				'id'    => $sr_prefix.'_captiontext',  
				'type'  => 'color'
			),
	
		array( 
			"id" => $sr_prefix."_captionstyling",
		   	"type" => "hidinggroupend"
		)
 );
 
 
/*-----------------------------------------------------------------------------------*/
/*	Callback Show fields
/*-----------------------------------------------------------------------------------*/

function sr_show_meta_subtitle() {  
 	global $sr_meta_subtitle, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_subtitle_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	sr_show_fields($sr_meta_subtitle);  
}


function sr_show_meta_medias() {  
 	global $sr_meta_medias, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_medias_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	sr_show_fields($sr_meta_medias);  
}


function sr_show_meta_audio() {  
 	global $sr_meta_audio, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_audio_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
	sr_show_fields($sr_meta_audio);  
}




function sr_show_meta_video() {  
 	global $sr_meta_video, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_video_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	sr_show_fields($sr_meta_video);  
}


function sr_show_meta_quote() {  
 	global $sr_meta_quote, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_quote_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    sr_show_fields($sr_meta_quote);  
}


function sr_show_meta_link() {  
 	global $sr_meta_link, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_link_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    sr_show_fields($sr_meta_link);  
}


function sr_show_meta_portfoliocategories() {  
 	global $sr_meta_portfoliocategories, $post;
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliocategories_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	sr_show_fields($sr_meta_portfoliocategories);  
}


function sr_show_meta_portfoliooptions() {  
 	global $sr_meta_portfoliooptions, $post;
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliooptions_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	sr_show_fields($sr_meta_portfoliooptions);  
}


function sr_show_meta_portfoliosingleoptions() {  
 	global $sr_meta_portfoliosingleoptions, $post;
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliosingleoptions_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	sr_show_fields($sr_meta_portfoliosingleoptions);  
}



/*-----------------------------------------------------------------------------------*/
/*	Show fields
/*-----------------------------------------------------------------------------------*/
function sr_show_fields($a,$side=null) {
 	global $post; 
	
	// Begin the field table and loop  
   if (!$side) { echo '<table class="form-table">'; } 
    foreach ($a as $field) {  
		
		if ($field['type'] == 'accentborder') {
			
			echo '<div class="accentborder" style="border-color:'.$field['id'].';"></div>';
			
		} else if ($field['type'] == 'info') {	
			
			if (isset($field['id'])) {
			echo '<tr><th></th><td class="sr_meta_info">';
			if ($field['label'] !== 'main') {
				echo '<br>------------------------<br><b>'.$field['desc'].'</b><br>------------------------';
			} else {
				echo '<br><b>'.$field['desc'].'</b>';
			}
			echo '</td></tr>';
			}
			
		} else if ($field['type'] == 'hidinggroupstart') {
			$relatedArray = explode(' ',$field['hiding']);
			$hideClass = '';
			foreach ($relatedArray as $r) { $hideClass .= $field['id'].'_'.$r.' '; }
			echo '<tbody class="hidinggroup hide'.$field['id'].' '.$hideClass.'">';
		} else if ($field['type'] !== 'hidinggroupend') {
			
    	// get value of this field if it exists for this post  
    	$meta = get_post_meta($post->ID, $field['id'], true);  
		if ($meta == '' && (isset($field['default']) && $field['default'] !== '')) { $meta = $field['default']; }
    	// begin a table row with  
    	if (!$side) {
			echo '<tr class="'.$field['id'].'"> 
    			<th><label for="'.$field['id'].'"><b>'.$field['label'].'</b></label><br /><span class="sr_description">'.$field['desc'].'</span></th> 
    			<td>';
		} else {
			echo '<br><label for="'.$field['id'].'"><b>'.$field['label'].'</b></label><br /><span class="sr_description">'.$field['desc'].'</span><br>';
		}
    			switch($field['type']) {  
                    					
					// text
    				case 'text':
						if ($post->post_type == 'post' && $field['id'] == '_sr_subtitle') { 
							echo '<div class="sr_replacefield">The date will be shown as "subtitle"</div>
							<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="" />'; }
						else {  
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />';
						}
					break;
					
					// title
    				case 'title':
						if ($post->post_type == 'post' && $field['id'] == '_sr_subtitle') { 
							echo '<div class="sr_replacefield">The date will be shown as "subtitle"</div>
							<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="" />
							<input type="hidden" name="'.$field['id'].'-size" id="'.$field['id'].'-size" value="h6" />
							'; }
						else {  
							echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.htmlentities($meta).'" size="30" />';
							
							$defaultSize = get_post_meta($post->ID, $field['id'].'-size', true);
							if ($defaultSize == '' && $post->post_type == 'post' && $field['id'] == '_sr_alttitle') { $defaultSize = 'h3'; }
							if ($defaultSize == '' && (isset($field['defaultsize']) && $field['defaultsize'] !== '')) { $defaultSize = $field['defaultsize']; }
							echo '<select name="'.$field['id'].'-size" id="'.$field['id'].'-size" style="margin-left:10px;top:-2px;position:relative;">';
							for ($i=1;$i<7;$i++) {
								if ($defaultSize == 'h'.$i) { $selected = 'selected="selected"'; } else { $selected = ''; }
								echo '<option value="h'.$i.'" '.$selected.'>H'.$i.'</option>';
							}
							echo '</select>';
						}
					break;
					
					// textarea
					case 'textarea':  
					    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>';  
					break;
					
					// tinymce
					case 'tinymce':  
					    wp_editor( $meta, $field['id'], array(
								'wpautop'       => true,
								'media_buttons' => false,
								'textarea_name' => $field['id'],
								'textarea_rows' => 5
							) );  
					break;
										
					// select
					case 'select':
						if ($field['id'] == '_sr_slider_slider' && !class_exists('RevSlider')) {
							echo '<div class="sr_replacefield">You need to install the Revolution Slider plugin (not included in the theme)</div>';
							echo '<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="" />';
						} else {
							echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
							$i = 0;
							foreach ($field['option'] as $var) {
								if ($meta == $var['value']) { $selected = 'selected="selected"'; } else { if ($meta == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
								
								// Condition if portfolio type
								if ($post->post_type == 'portfolio' && $field['id'] == '_sr_separator' && $var['value'] == 'separator') { } else {
									echo '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
								}
							$i++;	
							}			  
							echo '</select>'; 
						}
					break;
					
					// select-hiding
					case 'select-hiding':  
					    echo '<div class="select-hiding">
								<select name="'.$field['id'].'" id="'.$field['id'].'">';
						$i = 0;
						foreach ($field['option'] as $var) {
							if ($meta == $var['value']) { $selected = 'selected="selected"'; } else { if ($meta == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
						$i++;	
						}			  
						echo '</select></div>';   
					break;
					
					//color
					case "color":
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" class="sr-color-field" />';
					break;
					
					// image  
					case 'image':  
						echo '	<div class="single-image">
								<input class="upload_image" type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<input class="add_singleimage sr-button" type="button" value="Add Image" /><br />
								<span class="preview_image"><img class="'.$field['id'].'"  src="'.$meta.'" alt="" /></span>
						</div>';		
					break;
					
					// video  
					case 'video':  
						echo '	<div class="single-video">
								<input class="upload_video" type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<input class="add_singlevideo sr-button" type="button" value="Add Video" /><br />
						</div>';		
					break;
					
					// portfoliocategories
					case 'portfoliocategories':  
						$categories = get_terms( 'portfolio_category');
						 
					    echo '<select name="'.$field['id'].'[]" id="'.$field['id'].'" size="5" multiple>';
					    if ($meta[0] == 'all' || $meta[0] == '') { echo '<option value="" selected="selected">All</option>'; } 
						else { echo '<option value="">All</option>'; }
						$i = 0;
						foreach ($categories as $cat) {
							$selected = '';
							foreach ($meta as $m) { if (term_exists( $m , 'portfolio_category' ) && $m == $cat->slug) { $selected = 'selected="selected"'; } } 
							echo '<option value="'.$cat->slug.'" '.$selected.'>'.$cat->name.'</option>';
						$i++;	
						}			  
						echo '</select>';   
					break;
					
					//gallery_post
					case "gallery_post":
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
							  $gal = get_posts( array('post_type' => 'gallery') );
							  foreach ( $gal as $g ) {
								if ($g->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
								$option = '<option value="' . $g->ID . '" '.$active.'>';
								$option .= $g->post_title;
								$option .= '</option>';
								echo $option;
							  }
						echo '</select>';
					break;
										
					// gallery  
					case 'gallery':  
						echo '<div id="sortable'.$field['id'].'" class="sortable-medias">';
						echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_avoc_theme').'" />
								<textarea name="'.$field['id'].'" style="display: none;" class="media-value">'.$meta.'</textarea>';
						echo '<ul id="sortable" class="media-elements">';		
					    if ($meta) {
							$meta = explode('|||', $meta);
					        foreach($meta as $row) {
								$object = explode('~~', $row);
								$type = $object[0];
								$val = $object[1];
								if ($type == 'image') {
									$image = wp_get_attachment_image_src($val, 'thumbnail'); $image = $image[0];
									echo '<li class="ui-state-default" title="image"><img src="'.$image.'" class="'.$val.'"><div class="delete"><span></span></div></li>';
								} else if ($type == 'video') {
									echo '<li class="ui-state-default" title="video"><div class="move">move</div><textarea name="videovalue">'.$val.'</textarea><div class="delete"><span></span></div></li>';
								}
					        }  
					    }  
					    echo '</ul>';
						echo '</div>';				
					break;
					
					// slides  
					case 'slides':  
						echo '<div id="sortable'.$field['id'].'" class="sortable-slides">';
						echo '	<input class="add_image add_slide button" type="button" value="'.__("Add Slide", 'sr_avoc_theme').'" />
								<textarea name="'.$field['id'].'" style="display: none;" class="slide-value">'.$meta.'</textarea>';
						echo '<ul id="sortable" class="slide-elements">';		
					    if ($meta) {
							$meta = explode('||', $meta);
					        foreach($meta as $row) {
								$object = explode('~~', $row);
								
								$imageId = $object[0];
								$thumbnail = $object[1];
								$mainTitle = $object[2];
								$mainTitleSize = $object[3];
								$subTitle = $object[4];
								$subTitleSize = $object[5];
								$color = $object[6];
								
								echo '<li><img src="'.$thumbnail.'" data-id="'.$imageId.'" /><div class="slide-titles"><input name="maintitle" type="text" placeholder="Main title" value="'.$mainTitle.'">';
								
								echo '<select name="maintitle-size">';
								for($u=1;$u<7;$u++) {
									if ($mainTitleSize == 'h'.$u) { $selected = 'selected'; } else { $selected = ''; }
									echo '<option value="h'.$u.'" '.$selected.'>H'.$u.'</option>';	
								}
								echo '</select><br>';
								
								echo '<input name="subtitle" type="text" placeholder="Subtitle" value="'.$subTitle.'">';
								
								echo'<select name="subtitle-size">';
								for($e=1;$e<7;$e++) {
									if ($subTitleSize == 'h'.$e) { $selected = 'selected'; } else { $selected = ''; }
									echo '<option value="h'.$e.'" '.$selected.'>H'.$e.'</option>';	
								}
								echo '</select><br><br>';
								
								echo '<label>Text color: </label><select name="text-color">';
								if ($color == 'text-dark') { echo '<option value="text-dark" selected>Dark</option>'; } else { echo '<option value="text-dark">Dark</option>'; }
								if ($color == 'text-light') { echo '<option value="text-light" selected>Light</option>'; } else { echo '<option value="text-light">Light</option>'; }
								echo '</select></div><a href="#" class="delete">Delete</a></li>';
								
					        }  
					    }
						
					    echo '</ul>';
						echo '</div>';				
					break;
					
					// medias  
					case 'medias':
						echo '<div id="sortable'.$field['id'].'" class="sortable-medias">';
						echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_avoc_theme').'" /> 
								<input class="add_video button" type="button" value="'.__("Add Video", 'sr_avoc_theme').'" />
								<textarea name="'.$field['id'].'" style="display: none;" class="media-value">'.$meta.'</textarea>';
						echo '<ul id="sortable" class="media-elements">';		
					    if ($meta) {
							$meta = explode('|||', $meta);
					        foreach($meta as $row) {
								$object = explode('~~', $row);
								$type = $object[0];
								$val = $object[1];
								if ($type == 'image') {
									$image = wp_get_attachment_image_src($val, 'thumbnail'); $image = $image[0];
									echo '<li class="ui-state-default" title="image"><img src="'.$image.'" class="'.$val.'"><div class="delete"><span></span></div></li>';
								} else if ($type == 'video') {
									echo '<li class="ui-state-default" title="video"><div class="move">move</div><textarea name="videovalue">'.$val.'</textarea><div class="delete"><span></span></div></li>';
								}
					        }  
					    }  
					    echo '</ul>';
						echo '</div>';
					break;
					
					// sortable
    				case 'sortable':
						echo '<div id="sortable-elements">';
						
						// Create the selectbox + Count + Hiddenfield
						$hiddenfields = '';
						$elements = '';
						$count = 0;
						foreach ($field['options'] as $option) {
							$hiddenfields .= '<div class="'.$option['element'].'">
												<li class="ui-state-default" title="'.$option['element'].'">
												<div class="edit"><span></span></div><div class="move">'.$option['name'].' ()</div><div class="delete"><span></span></div>
												<div class="editcontent">';
							foreach ($option['fields'] as $f) {
								switch($f['type']) { 
									case 'text':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
											<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value=""></div>
										</div>';
									break;
									case 'textarea':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
											<div class="rowvalue"><textarea name="'.$f['id'].'" class="'.$f['id'].'"></textarea></div>
										</div>';
									break;
									case 'singleimage':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
											<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value="">
												<input type="button" name="add-singleimage" class="add_singleimage" value="'.__('Add Image', 'sr_avoc_theme').'"></div>
										</div>';
									break;
									case 'select':
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
										$hiddenfields .= '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">';	
										$y = 0;
										foreach ($f['options'] as $var) {
											$hiddenfields .= '<option value="'.$var['value'].'" /> '.$var['name'].'</div>';
										$y++;	
										}			  
										$hiddenfields .= '</select></div></div>';   
									break;
									case 'sliderselect':  
										$hiddenfields .= '<div class="row">
											<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
										$hiddenfields .= '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">
												<option value="no">'.__("Select Slider", 'sr_avoc_theme').' ...</option>';
										  $pages = get_posts( array( 'post_type' => 'slider' ) ); 
										  foreach ( $pages as $page ) {
											$hiddenfields .= '<option value="' . $page->ID . '">'.$page->post_title.'</option>';
										  }
										$hiddenfields .= '</select></div></div>';   
									break;
								} # END switch $f
							}					
							$hiddenfields .= '</div>
												</li>
											</div>';
							
							$elements .= '<option value="'.$option['element'].'">'.$option['name'].'</option>';
							$count++;
							}
						if ($count > 1) { $elements = '<select name="element-sortable" class="element-sortable">'.$elements.'</select>'; }
						else { $elements = '<select name="element-sortable" class="element-sortable" style="display:none;">'.$elements.'</select>'; }
						// END	
						
						// display the saved values
						$values = explode('|||', $meta);
						echo '<ul id="sortable" class="visual-elements visual-slides">';
						foreach ($values as $v) {
							$item = explode('|', $v);
							
							foreach ($field['options'] as $option) {
								if ($option['element'] == $item[0]) {
									$value = explode('~~', $item[1]);
									
									echo '<li class="ui-state-default" title="'.$option['element'].'"><div class="edit"><span></span></div><div class="move">'.$option['name'].' ('.$value[0].')</div><div class="delete"><span></span></div>';
									echo '<div class="editcontent">';
									
									$i = 0;
									foreach ($option['fields'] as $f) {
										switch($f['type']) { 
											case 'text':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
													<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value="'.$value[$i].'"></div>
												</div>';
											break;
											case 'textarea':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
													<div class="rowvalue"><textarea name="'.$f['id'].'" class="'.$f['id'].'">'.$value[$i].'</textarea></div>
												</div>';
											break;
											case 'singleimage':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>
													<div class="rowvalue"><input type="text" name="'.$f['id'].'" class="'.$f['id'].'" value="'.$value[$i].'">
														<input type="button" name="add-singleimage" class="add_singleimage" value="'.__('Add Image', 'sr_avoc_theme').'"></div>
												</div>';
											break;
											case 'select':
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
												echo '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">';	
												$y = 0;
												foreach ($f['options'] as $var) {
													if ($value[$i] == $var['value']) { $selected = 'selected="selected"'; 
													} else { if ($value[$i] == '' && $y == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
													echo '<option value="'.$var['value'].'" '.$selected.' /> '.$var['name'].'</div>';
												$y++;	
												}			  
												echo '</select></div></div>';   
											break;
											case 'sliderselect':  
												echo '<div class="row">
													<div class="rowtitle"><label for="'.$f['id'].'">'.$f['name'].'</label></div>';
												echo '<div class="rowvalue"><select name="'.$f['id'].'" class="'.$f['id'].'">
														<option value="no">'.__("Select Slider", 'sr_avoc_theme').' ...</option>';
												  $pages = get_posts( array( 'post_type' => 'slider' ) ); 
												  foreach ( $pages as $page ) {
													if ($page->ID == $value[$i]) { $active = 'selected="selected"'; }  else { $active = ''; } 
													$option = '<option value="' . $page->ID . '" '.$active.'>';
													$option .= $page->post_title;
													$option .= '</option>';
													echo $option;
												  }
												echo '</select></div></div>';   
											break;
										} # END switch $f
										$i++;	
									}
									echo '</div></li>';
								}	
							}
						}
						echo '</ul>';
						// END
						
						echo '	<input type="button" name="add-element" class="add-element add-slide" value="'.__('Add Item', 'sr_avoc_theme').'"/>
								'.$elements.'
								<textarea name="'.$field['id'].'" id="'.$field['id'].'" class="value-elements value-slides">'.$meta.'</textarea>';
						
						// HIDDEN ELEMENTS FOR JS
						echo '<div id="hiddenelements" style="display: none;">'.$hiddenfields.'</div>';
						
						echo '</div>';
					break;
					
					
					 
                 } //end switch  
    	 if (!$side) { echo '</td></tr>'; } else { echo '<br>'; }
		} // END if info
		
		if ($field['type'] == 'hidinggroupend') {
			echo '</tbody>';
		}
		
	} // end foreach  
	if (!$side) { echo '</table>'; } // end table
}



/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/

function sr_save_meta_subtitle($post_id) {  
    global $sr_meta_subtitle;  
  
    // verify nonce  
    if (!isset($_POST['meta_subtitle_nonce']) || !wp_verify_nonce($_POST['meta_subtitle_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($sr_meta_subtitle as $field) {  
        if ($field['type'] !== 'info') {
			$old = get_post_meta($post_id, $field['id'], true);  
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_subtitle');



function sr_save_meta_medias($post_id) {  
    global $sr_meta_medias;  
  
    // verify nonce  
    if (!isset($_POST['meta_medias_nonce']) || !wp_verify_nonce($_POST['meta_medias_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_medias as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			}  
		}
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_medias');


function sr_save_meta_audio($post_id) {  
    global $sr_meta_audio;  
  
    // verify nonce  
    if (!isset($_POST['meta_audio_nonce']) || !wp_verify_nonce($_POST['meta_audio_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_audio as $field) {  
        if ($field['type'] !== 'info') {
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			}  
		}
		}  
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_audio');





function sr_save_meta_video($post_id) {  
    global $sr_meta_video;  
  
    // verify nonce  
    if (!isset($_POST['meta_video_nonce']) || !wp_verify_nonce($_POST['meta_video_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_video as $field) {
		if ($field['type'] !== 'info') {
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			}  
		}
		}
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_video');



function sr_save_meta_quote($post_id) {  
    global $sr_meta_quote;  
  
    // verify nonce  
    if (!isset($_POST['meta_quote_nonce']) || !wp_verify_nonce($_POST['meta_quote_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_quote as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_quote');



function sr_save_meta_link($post_id) {  
    global $sr_meta_link;  
  
    // verify nonce  
    if (!isset($_POST['meta_link_nonce']) || !wp_verify_nonce($_POST['meta_link_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_link as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new !== '' && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_link');



function sr_save_meta_portfoliocategories($post_id) {  
    global $sr_meta_portfoliocategories;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliocategories_nonce']) || !wp_verify_nonce($_POST['meta_portfoliocategories_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_portfoliocategories as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			} 
		}
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_portfoliocategories');


function sr_save_meta_portfoliooptions($post_id) {  
    global $sr_meta_portfoliooptions;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliooptions_nonce']) || !wp_verify_nonce($_POST['meta_portfoliooptions_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_portfoliooptions as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			} 
		}
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_portfoliooptions');


function sr_save_meta_portfoliosingleoptions($post_id) {  
    global $sr_meta_portfoliosingleoptions;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliosingleoptions_nonce']) || !wp_verify_nonce($_POST['meta_portfoliosingleoptions_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($sr_meta_portfoliosingleoptions as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
		if (isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];  
			if ($new !== '' && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);  
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);  
			} 
		}
    } // end foreach  
}  
add_action('save_post', 'sr_save_meta_portfoliosingleoptions');




/*-----------------------------------------------------------------------------------*/
/*	Register and load function javascript
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_admin_meta_js' ) ) {
    function sr_admin_meta_js($hook) {
		global $pagenow, $sr_version;

		wp_register_script('functions-script', get_template_directory_uri() . '/theme-admin/functions/js/functions_script.js', '', $sr_version);
		wp_enqueue_script('functions-script');
		
		if ( 
			(isset($_GET['post']) && (isset($_GET['action']) && $_GET['action'] == 'edit') && (get_post_type( $_GET['post'] )  == 'post' || get_post_type( $_GET['post'] )  == 'page') )
			|| ($pagenow == 'post-new.php' && (!isset($_GET['post_type']) || $_GET['post_type'] == 'page')) ) {
			wp_register_script('customfields-script', get_template_directory_uri() . '/theme-admin/functions/js/customfields_script.js', '', $sr_version);
			wp_enqueue_script('customfields-script');
		}
		
		wp_register_style('functions-style', get_template_directory_uri() . '/theme-admin/functions/css/functions.css', '', $sr_version);
		wp_enqueue_style('functions-style');
    }
    
    add_action('admin_enqueue_scripts','sr_admin_meta_js',10,1);
}


?>