<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add Pagebuilder Metabox
/*-----------------------------------------------------------------------------------*/

function sr_add_meta_pagebuilder() {  
    add_meta_box(  
        'meta_pagebuilder', // $id  
        __('Pagebuilder', 'sr_avoc_theme'), // $title  
        'sr_show_meta_pagebuilder', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority
		
	add_meta_box(  
        'meta_pagebuilder', // $id  
        __('Pagebuilder', 'sr_avoc_theme'), // $title  
        'sr_show_meta_pagebuilder', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority		
}  
add_action('add_meta_boxes', 'sr_add_meta_pagebuilder');

	

/*-----------------------------------------------------------------------------------*/
/*	Pagebuilder (Options)
/*-----------------------------------------------------------------------------------*/
$sr_meta_pagebuilder = array(  
	array(  
		'title' => __('Horizontal Section', 'sr_avoc_theme'),
	   	'id'    => 'horizontalsection',
	   	'desc' => '',
	   	'type' => 'row',
		'fields' => array(
			
			array(
				"desc" => "<i>A horizontalsection is a fullwidth section which have a background (color,image,video) to seperate some specific content from default content.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Background', 'sr_avoc_theme'),
				'desc' => '',
				'id' => 'background',
				'type' => 'select-hiding',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Color', 'sr_avoc_theme'), 
							'value' => 'color'),			 	
					array(	'name' => __('Image', 'sr_avoc_theme'), 
							'value'=> 'image'),
					array(	'name' => __('Video', 'sr_avoc_theme'), 
							'value'=> 'video')
					)
			),
			
			// HS Color BAckground
			array( 
					"id" => "horizontalsection-background",
					"hiding" => "color",	
					"type" => "hidinggroupstart"
				),
				array( 	"label" => __("Background Color", 'sr_avoc_theme'),
					   	"desc" => 'Choose a background color for this section',
					   	"id" => 'colorbg',
					   	"type" => "color",
					   	'sendval' => true
				),
			array( 
					"id" => "horizontalsection-background",
					"type" => "hidinggroupend"
				),
				
			
			// HS IMAGE Background
			array( 
					"id" => "horizontalsection-background",
					"hiding" => "image",	
					"type" => "hidinggroupstart"
				),
				array( 	"label" => __("Background Image", 'sr_avoc_theme'),
					   	"desc" => 'Choose a background color for this section',
					   	"id" => 'imagebg',
				  		"type" => "image",
					   	'sendval' => true
					  ),	
					  
				array( 	"label" => __("Parallax Effect", 'sr_avoc_theme'),
					   	"desc" => '',
					   	"id" => "imageparallax",
					   	"type" => "select",
					   	'sendval' => true,
					   	"option" => array( 
							array(	"name" =>__("Yes", 'sr_avoc_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value"=> "false")
							)
					  ),
			array( 
					"id" => "horizontalsection-background",
					"type" => "hidinggroupend"
				),
				
				
			// HS VIDEO Background
			array( 
					"id" => "horizontalsection-background",
					"hiding" => "video",	
					"type" => "hidinggroupstart"
				),
				array( 	"label" => __("MP4 file url", 'sr_avoc_theme'),
					   	"desc" => 'The url to the MP4 file',
					   	"id" => "videomp4",
				   		"type" => "text",
					   	'sendval' => true
					  ),
					  
				array( 	"label" => __("WEBM file url", 'sr_avoc_theme'),
					   	"desc" => 'The url to the WEBM file',
					   	"id" => "videowebm",
				   		"type" => "text",
					   	'sendval' => true
					  ),
					  
				array( "label" => __("OGV file url", 'sr_avoc_theme'),
					   "desc" => 'The url to the OGV file',
					   "id" => "videoogv",
				   		"type" => "text",
					   	'sendval' => true
					  ),
					  
				array( "label" => __("Video Width", 'sr_avoc_theme'),
					   "desc" => 'Please enter the width of the video file',
					   "id" => "videowidth",
				   		"type" => "text",
					   	'sendval' => true
					  ),
					  
				array( "label" => __("Video Height", 'sr_avoc_theme'),
					   "desc" => 'Please enter the height of the video file',
					   "id" => "videoheight",
				   		"type" => "text",
					   	'sendval' => true
					  ),
					  
				array( "label" => __("Poster", 'sr_avoc_theme'),
					   "desc" => "This image will be shown for devices which don't support background video. Please make sure that this image has the same height than the video itself",
					   "id" => "videoposter",
				   		"type" => "image",
					   	'sendval' => true
					  ),	
					  
				array( "label" => __("Parallax Effect", 'sr_avoc_theme'),
					   "desc" => '',
					   "id" => "videoparallax",
					   "type" => "select",
					   	'sendval' => true,
					   "option" => array( 
							array(	"name" =>__("Yes", 'sr_avoc_theme'), 
									"value" => "true"),			 	
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value"=> "false")
							)
					  ),
				
				array( "label" => __("Overlay Color", 'sr_avoc_theme'),
					   "desc" => "Leave it empty if you don't want any overlay color",
					   "id" => "videooverlay",
					   "type" => "color",
					   	'sendval' => true
					  ),
					  
				array( "label" => __("Overlay Opacity", 'sr_avoc_theme'),
					   "desc" => '',
					   "id" => "videooverlayopacity",
					   "type" => "select",
					   	'sendval' => true,
					   "option" => array( 
							array(	"name" =>__("0.1", 'sr_avoc_theme'), 
									"value" => "1"),			 	
							array(	"name" => __("0.2", 'sr_avoc_theme'), 
									"value"=> "2"),
							array(	"name" => __("0.3", 'sr_avoc_theme'), 
									"value"=> "3"),
							array(	"name" =>__("0.4", 'sr_avoc_theme'), 
									"value" => "4"),			 	
							array(	"name" => __("0.5", 'sr_avoc_theme'), 
									"value"=> "5"),
							array(	"name" => __("0.6", 'sr_avoc_theme'), 
									"value"=> "6"),
							array(	"name" => __("0.7", 'sr_avoc_theme'), 
									"value"=> "7"),
							array(	"name" => __("0.8", 'sr_avoc_theme'), 
									"value"=> "8"),
							array(	"name" =>__("0.9", 'sr_avoc_theme'), 
									"value" => "9")
							)
					  ),
			array( 
					"id" => "horizontalsection-background",
					"type" => "hidinggroupend"
				),
				
				
			array(
					'label' => __('Text color', 'sr_avoc_theme'),
					'desc' => '',
					'id' => 'textcolor',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('Light', 'sr_avoc_theme'), 
								'value' => 'text-light'),			 	
						array(	'name' => __('Dark', 'sr_avoc_theme'), 
								'value'=> 'text-dark')
						)
				),
				
			array( 	"label" => __("Padding Top", 'sr_avoc_theme'),
				   	"desc" => 'Don\'nt write "px" Example = 120',
				   	"id" => "pdtop",
				   	"type" => "text",
					'sendval' => true,
					"default" => "120"
				),
				
			array( 	"label" => __("Padding Bottom", 'sr_avoc_theme'),
				   	"desc" => 'Don\'nt write "px" Example = 120',
				   	"id" => "pdbottom",
				   	"type" => "text",
					'sendval' => true,
					"default" => "120"
				),
				
			array(
					'label' => __('Full window Height?', 'sr_avoc_theme'),
					'desc' => __('The height of the section will automatically take the window height.  If your content needs more space, it of course will adapt to this.<br>NOTE: Your content will be automatically centered.', 'sr_avoc_theme'),
					'id' => 'fullheight',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('No', 'sr_avoc_theme'), 
								'value' => 'false'),			 	
						array(	'name' => __('Yes', 'sr_avoc_theme'), 
								'value'=> 'true')
						)
				),
		) 
	),
	array(  
		'title' => __('Columns', 'sr_avoc_theme'),
	   	'id'    => 'columnsection',
	   	'desc' => '',
	   	'type' => 'row',
		'fields' => array(
			
			array(
				"desc" => "<i>Choose your column layout</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Wrapper', 'sr_avoc_theme'),
				'desc' => 'Choose the wrapper/content size.<br><b>NOTE</b>: if "mini" is choosed the columns doesn\'t have any impact and will be all aligned one below the other.',
				'id' => 'wrapper',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Default (1100px width)', 'sr_avoc_theme'), 
							'value' => 'wrapper'),	
					array(	'name' => __('Small (780px width)', 'sr_avoc_theme'), 
							'value'=> 'wrapper-small'),
					array(	'name' => __('Mini (400px width)', 'sr_avoc_theme'), 
							'value'=> 'wrapper-mini'),
					array(	'name' => __('Full (100% of window width)', 'sr_avoc_theme'), 
							'value'=> 'wrapper-full')
					)
			),
			
			array(
				'label' => __('Animation', 'sr_avoc_theme'),
				'desc' => 'Do you want an animation for the columns',
				'id' => 'animation',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No', 'sr_avoc_theme'), 
							'value' => 'false'),	
					array(	'name' => __('Normal (not delayed)', 'sr_avoc_theme'), 
							'value'=> 'true'),
					array(	'name' => __('With delay', 'sr_avoc_theme'), 
							'value'=> 'delayed')
					)
			),
			
			array(
				'label' => __('Column Layout', 'sr_avoc_theme'),
				'desc' => '',
				'id' => 'layout',
				'type' => 'custom-select',
				'sendval' => false,
				'option' => array( 
					array(	'name' =>__('Full', 'sr_avoc_theme'), 
							'value' => 'one-full',
							'img' => 'col-1.png'),	
					array(	'name' => __('Half/Half', 'sr_avoc_theme'), 
							'value'=> 'one-half;one-half',
							'img' => 'col-2.png'),
					array(	'name' => __('Third/Third/Third', 'sr_avoc_theme'), 
							'value'=> 'one-third;one-third;one-third',
							'img' => 'col-3.png'),
					array(	'name' => __('Fourth/Fourth/Fourth/Fourth', 'sr_avoc_theme'), 
							'value'=> 'one-fourth;one-fourth;one-fourth;one-fourth',
							'img' => 'col-4.png'),
					array(	'name' => __('Fifth/Fifth/Fifth/Fifth/Fifth', 'sr_avoc_theme'), 
							'value'=> 'one-fifth;one-fifth;one-fifth;one-fifth;one-fifth',
							'img' => 'col-5.png'),
							
					array(	'name' => __('One Thrid/Two Third', 'sr_avoc_theme'), 
							'value'=> 'one-third;two-third',
							'img' => 'col-6.png'),
					array(	'name' => __('Two Thrid/One Third', 'sr_avoc_theme'), 
							'value'=> 'two-third;one-third',
							'img' => 'col-7.png'),
					array(	'name' => __('One Fourth/Three Fourth', 'sr_avoc_theme'), 
							'value'=> 'one-fourth;three-fourth',
							'img' => 'col-8.png'),
					array(	'name' => __('Three Fourth/One Fourth', 'sr_avoc_theme'), 
							'value'=> 'three-fourth;one-fourth',
							'img' => 'col-9.png'),
					array(	'name' => __('One Fourth/One Fourth/Two Fourth', 'sr_avoc_theme'), 
							'value'=> 'one-fourth;one-fourth;two-fourth',
							'img' => 'col-10.png'),
					array(	'name' => __('Two Fourth/One Fourth/One Fourth', 'sr_avoc_theme'), 
							'value'=> 'two-fourth;one-fourth;one-fourth',
							'img' => 'col-11.png'),
					array(	'name' => __('One Fourth/Two Fourth/One Fourth', 'sr_avoc_theme'), 
							'value'=> 'one-fourth;two-fourth;one-fourth',
							'img' => 'col-12.png')	
					)
			)
		
		)
	),
	array(  
		'title' => __('Wolf Parallax', 'sr_avoc_theme'),
	   	'id'    => 'wolf',
	   	'desc' => '',
	   	'type' => 'row',
		'fields' => array(
		
			array(
				"desc" => "<i>A Wolf section is a parallax grid section.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Wrapper', 'sr_avoc_theme'),
				'desc' => 'Choose the wrapper/content size.',
				'id' => 'wrapper',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Default (1100px width)', 'sr_avoc_theme'), 
							'value' => 'wrapper'),	
					array(	'name' => __('Small (780px width)', 'sr_avoc_theme'), 
							'value'=> 'wrapper-small'),
					array(	'name' => __('Full (100% of window width)', 'sr_avoc_theme'), 
							'value'=> 'wrapper-full')
					)
			),
			
			array(
				'label' => __('Scroll Parallax', 'sr_avoc_theme'),
				'desc' => 'Default parallax effect on scroll.',
				'id' => 'parallax',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Yes', 'sr_avoc_theme'), 
							'value' => 'true'),	
					array(	'name' => __('No', 'sr_avoc_theme'), 
							'value'=> 'false')
					)
			),
			
			array(
				'label' => __('Caption Parallax', 'sr_avoc_theme'),
				'desc' => 'Do you want the captions (text) to have an individual parallax speed?',
				'id' => 'captionparallax',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Yes', 'sr_avoc_theme'), 
							'value' => 'true'),	
					array(	'name' => __('No', 'sr_avoc_theme'), 
							'value'=> 'false')
					)
			),
			
			array(
				'label' => __('Random Horizontal Offset', 'sr_avoc_theme'),
				'desc' => 'This will add a horizontal offset to each item which leads to a "off-grid" layout.',
				'id' => 'randomhorizontaloffset',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No', 'sr_avoc_theme'), 
							'value' => 'false'),	
					array(	'name' => __('Yes', 'sr_avoc_theme'), 
							'value'=> 'true')
					)
			),
			
			array(
				'label' => __('Mouse Parallax', 'sr_avoc_theme'),
				'desc' => 'Additional parallax effect on mouse move.',
				'id' => 'mouseparallax',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No', 'sr_avoc_theme'), 
							'value' => 'false'),	
					array(	'name' => __('Yes', 'sr_avoc_theme'), 
							'value'=> 'true')
					)
			)
			
		)
	),
	array(  
		'title' => __('Spacer', 'sr_avoc_theme'),
	   	'id'    => 'spacer',
	   	'desc' => '',
	   	'type' => 'row,element',
		'fields' => array(
			
			array(
				"desc" => "<i>A spacer will add some space between your different rows and elements.</i>",
				"type" => "info"
			),
			
			array(
				'label' => __('Spacer Size', 'sr_avoc_theme'),
				'desc' => 'Which size do you want for the spacer',
				'id' => 'size',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Big', 'sr_avoc_theme'), 
							'value' => 'big'),	
					array(	'name' => __('Medium', 'sr_avoc_theme'), 
							'value'=> 'medium'),
					array(	'name' => __('Small', 'sr_avoc_theme'), 
							'value'=> 'small'),
					array(	'name' => __('Mini', 'sr_avoc_theme'), 
							'value'=> 'mini')	
					)
			)
		
		)
		
	),
	array(  
		'title' => __('Text / Editor', 'sr_avoc_theme'),
	   	'id'    => 'text',
	   	'desc' => '',
	   	'type' => 'row,element',
		'fields' =>  array(
		
			array(
				'label' => '',
				'desc' => '',
				'id' => 'content',
				'type' => 'editor',
				'sendval' => true
			)
		
		)
	),
	array(  
		'title' => __('Slider', 'sr_avoc_theme'),
	   	'id'    => 'sr-slider',
	   	'desc' => '',
	   	'type' => 'element',
		'fields' =>  array(
		
			array(
				'label' => __("Images", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'images',
				'type' => 'gallery',
				'sendval' => true
			),
			
			array(
				'label' => __("Autoplay", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'autoplay',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No', 'sr_avoc_theme'), 
							'value' => 'false'),	
					array(	'name' => __('Yes', 'sr_avoc_theme'), 
							'value'=> 'true')	
					)
				
			),
			
			array(
				'label' => __("Loop", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'loop',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Yes', 'sr_avoc_theme'), 
							'value' => 'true'),	
					array(	'name' => __('No', 'sr_avoc_theme'), 
							'value'=> 'false')	
					)
				
			),
			
			array(
				'label' => __("Show Arrows", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'nav',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Yes', 'sr_avoc_theme'), 
							'value' => 'true'),	
					array(	'name' => __('No', 'sr_avoc_theme'), 
							'value'=> 'false')	
					)
				
			),
			
			array(
				'label' => __("Show Dots", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'dots',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No', 'sr_avoc_theme'), 
							'value' => 'false'),	
					array(	'name' => __('Yes', 'sr_avoc_theme'), 
							'value'=> 'true')	
					)
				
			)
		
		)
	),
	array(  
		'title' => __('Wolf item', 'sr_avoc_theme'),
	   	'id'    => 'wolfitem',
	   	'desc' => '',
	   	'type' => '',
		'fields' =>  array(
		
			array(
				'label' => __("Size", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'size',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Half', 'sr_avoc_theme'), 
							'value' => 'whalf'),	
					array(	'name' => __('Third', 'sr_avoc_theme'), 
							'value'=> 'wthird'),
					array(	'name' => __('Full', 'sr_avoc_theme'), 
							'value'=> 'wfull')	
					)
				
			),
						
			array(
				'label' => __("Individual Parallax Scroll Speed (optional)", 'sr_avoc_theme'),  
				'desc'  => __("Use a speed between <strong>'-2.0' and '+2.0'</strong><br><strong>Leave empty for a randomly assigned speed.</strong>", 'sr_avoc_theme'),  
				'id' => 'speed',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Image", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'image',
				'type' => 'image',
				'sendval' => true
			),
			
			array(
				'label' => __('Link to', 'sr_avoc_theme'),
				'desc' => "",  
				'id' => 'imagelink',
				'type' => 'select-hiding',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No link', 'sr_avoc_theme'), 
							'value' => 'false'),			 	
					array(	'name' => __('Custom URL', 'sr_avoc_theme'), 
							'value'=> 'url'),
					array(	'name' => __('Image Lightbox', 'sr_avoc_theme'), 
							'value'=> 'lightbox'),
					array(	'name' => __('Youtube Video', 'sr_avoc_theme'), 
							'value'=> 'youtube'),
					array(	'name' => __('Vimeo Video', 'sr_avoc_theme'), 
							'value'=> 'vimeo')
					)
			),	
			
			array( 
					"id" => "wolfitem-imagelink",
					"hiding" => "url",	
					"type" => "hidinggroupstart"
				),
				
				array(
					'label' => __("URL", 'sr_avoc_theme'),  
					'desc'  => "",  
					'id' => 'url',
					'type' => 'text',
					'sendval' => true
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"type" => "hidinggroupend"
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"hiding" => "lightbox",	
					"type" => "hidinggroupstart"
				),
				
				array(
					'label' => __("Image Lightbox", 'sr_avoc_theme'),  
					'desc'  => "",  
					'id' => 'lightbox',
					'type' => 'image',
					'sendval' => true
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"type" => "hidinggroupend"
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"hiding" => "youtube",	
					"type" => "hidinggroupstart"
				),
				
				array(
					'label' => __("Youtube ID", 'sr_avoc_theme'),  
					'desc'  => "",  
					'id' => 'youtube',
					'type' => 'text',
					'sendval' => true
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"type" => "hidinggroupend"
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"hiding" => "vimeo",	
					"type" => "hidinggroupstart"
				),
				
				array(
					'label' => __("Vimeo ID", 'sr_avoc_theme'),  
					'desc'  => "",  
					'id' => 'vimeo',
					'type' => 'text',
					'sendval' => true
				),
				
			array( 
					"id" => "wolfitem-imagelink",
					"type" => "hidinggroupend"
				),
				
																
			array(
				"desc" => "Caption",
				"type" => "title"
			),
			
			array(
				'label' => __('Show Caption', 'sr_avoc_theme'),
				'desc' => '',
				'id' => 'captionshow',
				'type' => 'select-hiding',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('No', 'sr_avoc_theme'), 
							'value' => 'false'),			 	
					array(	'name' => __('Yes', 'sr_avoc_theme'), 
							'value'=> 'true')
					)
			),	
			
			array( 
					"id" => "wolfitem-captionshow",
					"hiding" => "true",	
					"type" => "hidinggroupstart"
				),
				
				array(
					'label' => __("Image Position", 'sr_avoc_theme'),  
					'desc'  => __("Left or Right.  Your caption will automatically take the other side (if not static).", 'sr_avoc_theme'),  
					'id' => 'imageposition',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('Left', 'sr_avoc_theme'), 
								'value' => 'wleft'),	
						array(	'name' => __('Right', 'sr_avoc_theme'), 
								'value'=> 'wright')	
						)
					
				),
				
				array( 	"label" => __("Custom Caption width (optional)", 'sr_avoc_theme'),
						"desc" => 'Leave empty if auto width. Enter a valid % number between 1% and 100%<br><strong>Example: 55%</strong>',
						"id" => 'customcaptionwidth',
						"type" => "text",
						'sendval' => true
				),
				array( 	"label" => __("Custom Image width (optional)", 'sr_avoc_theme'),
						"desc" => 'Leave empty if auto width. Enter a valid % number between 1% and 100%<br><strong>Example: 55%</strong>',
						"id" => 'customimagewidth',
						"type" => "text",
						'sendval' => true
				),
			
				array(
					'label' => 'Caption Content',
					'desc' => '',
					'id' => 'content',
					'type' => 'editor',
					'sendval' => true
				),
				
				array(
					'label' => __('Caption position', 'sr_avoc_theme'),
					'desc' => 'Static will place the caption content below the image.',
					'id' => 'captionposition',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('Overlay (left/right)', 'sr_avoc_theme'), 
								'value' => 'overlay'),			 	
						array(	'name' => __('Static', 'sr_avoc_theme'), 
								'value'=> 'static')
						)
				),
				
			array( 
					"id" => "wolfitem-captionshow",
					"type" => "hidinggroupend"
				),
				
		)
	),
	
	array(  
		'title' => __('Team Member', 'sr_avoc_theme'),
	   	'id'    => 'sr-teammember',
	   	'desc' => '',
	   	'type' => 'element',
		'fields' =>  array(
		
			array(
				'label' => __("Image", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'image',
				'type' => 'image',
				'sendval' => true
			),
			
			array(
				'label' => __('Offset', 'sr_avoc_theme'),
				'desc' => "If yes, the Name will be overlaying the image",
				'id' => 'offset',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Yes', 'sr_avoc_theme'), 
							'value' => 'offset'),			 	
					array(	'name' => __('No', 'sr_avoc_theme'), 
							'value'=> '')
					)
			),
			
			array(
				'label' => __("Name", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'name',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Title", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'title',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => 'Text',
				'desc' => '',
				'id' => 'content',
				'type' => 'editor',
				'sendval' => true
			),
			
			array(
				'label' => __("Facebook Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'facebook',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Behance Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'behance',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Dribbble Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'dribbble',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Twitter Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'twitter',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Google Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'google',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Instagram Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'instagram',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Tumblr Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'tumblr',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("LinkedIn Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'linkedin',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("VK Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'vk',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Soundcloud Profile", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'soundcloud',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Website link", 'sr_avoc_theme'),  
				'desc'  => "make sure to start with http://",  
				'id' => 'website',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Mail Adress", 'sr_avoc_theme'),  
				'desc'  => "just enter the email adress",  
				'id' => 'mail',
				'type' => 'text',
				'sendval' => true
			)
		)
	),
	
	array(  
		'title' => __('Google Map', 'sr_avoc_theme'),
	   	'id'    => 'sr-googlemap',
	   	'desc' => '',
	   	'type' => 'row,element',
		'fields' => array(
			
			array(
				'label' => __("Latitude & Longitude", 'sr_avoc_theme'),  
				'desc'  => "Enter the google map latitude & longitude <strong>seperated by a comma</strong> using this tool: <br>http://itouchmap.com/latlong.html",  
				'id' => 'latlong',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __("Your API Key", 'sr_avoc_theme'),  
				'desc'  => "Since June 2016 you need to create an API Key",  
				'id' => 'apikey',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => 'Info Text',
				'desc' => '',
				'id' => 'content',
				'type' => 'editor',
				'sendval' => true
			),
			
			array(
				'label' => __("Pin Icon", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'pinicon',
				'type' => 'image',
				'sendval' => true
			),
			
			array(
				'label' => __("Height (optional)", 'sr_avoc_theme'),  
				'desc'  => "Default is 400.",  
				'id' => 'height',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => __('Map Style', 'sr_avoc_theme'),
				'desc' => '',
				'id' => 'style',
				'type' => 'select',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Default', 'sr_avoc_theme'), 
							'value' => 'default'),			 	
					array(	'name' => __('Greyscale', 'sr_avoc_theme'), 
							'value'=> 'greyscale')
					)
			)
			
		)
	),
	
	array(  
		'title' => __('Gallery', 'sr_avoc_theme'),
	   	'id'    => 'sr-gallery',
	   	'desc' => '',
	   	'type' => 'row,element',
		'fields' =>  array(
		
			array(
				'label' => __("Images", 'sr_avoc_theme'),  
				'desc'  => "",  
				'id' => 'images',
				'type' => 'gallery',
				'sendval' => true
			),
			
			array(
				'label' => __('Gallery type', 'sr_avoc_theme'),
				'desc' => '',
				'id' => 'type',
				'type' => 'select-hiding',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>__('Column Gallery', 'sr_avoc_theme'), 
							'value' => 'gallery'),			 	
					array(	'name' => __('Masonry', 'sr_avoc_theme'), 
							'value'=> 'masonry')
					)
			),
			
			// Column gallery
			array( 
					"id" => "sr-gallery-type",
					"hiding" => "gallery",	
					"type" => "hidinggroupstart"
				),
				
			array(
				"desc" => "<i>The column type will always respect the column size depending the screen size of the visitor.<br> So if you choose a 2 column in fullwidth mode (not in column) you should make your image available in the maximum size possible.<br>Example: the screensize currently is 2560px. So on 2 columns in fullwidth mode your images would need to be 1255px!</i>",
				"type" => "info"
			),
			
			array(
					'label' => __('Columns', 'sr_avoc_theme'),
					'desc' => '',
					'id' => 'columns',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('1', 'sr_avoc_theme'), 
								'value' => '1'),
						array(	'name' =>__('2', 'sr_avoc_theme'), 
								'value' => '2'),			 	
						array(	'name' => __('3', 'sr_avoc_theme'), 
								'value'=> '3'),
						array(	'name' => __('4', 'sr_avoc_theme'), 
								'value'=> '4'),
						array(	'name' => __('5', 'sr_avoc_theme'), 
								'value'=> '5'),
						array(	'name' => __('6', 'sr_avoc_theme'), 
								'value'=> '6')
						)
				),
				array(
					'label' => __('Animation', 'sr_avoc_theme'),
					'desc' => '',
					'id' => 'animation',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('No', 'sr_avoc_theme'), 
								'value' => 'false'),
						array(	'name' =>__('Normal (not delayed)', 'sr_avoc_theme'), 
								'value' => 'normal'),			 	
						array(	'name' => __('With delay', 'sr_avoc_theme'), 
								'value'=> 'delayed')
						)
				),
			array( 
					"id" => "sr-gallery-type",
					"type" => "hidinggroupend"
				),
				
			// Masonry gallery
			array( 
					"id" => "sr-gallery-type",
					"hiding" => "masonry",	
					"type" => "hidinggroupstart"
				),
				array(
					'label' => __('Tile Size', 'sr_avoc_theme'),
					'desc' => '',
					'id' => 'tilesize',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('Small (300)', 'sr_avoc_theme'), 
								'value' => '300'),			 	
						array(	'name' => __('Medium (420)', 'sr_avoc_theme'), 
								'value'=> '420'),
						array(	'name' => __('Big (600)', 'sr_avoc_theme'), 
								'value'=> '600'),
						array(	'name' => __('Ultra (800)', 'sr_avoc_theme'), 
								'value'=> '800')
						)
				),
				array(
					'label' => __('Crop Images', 'sr_avoc_theme'),
					'desc' => 'Do you want to crop your images to the same size?',
					'id' => 'crop',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('No', 'sr_avoc_theme'), 
								'value' => 'false'),
						array(	'name' =>__('Yes', 'sr_avoc_theme'), 
								'value' => 'true')
						)
				),
			array( 
					"id" => "sr-gallery-type",
					"type" => "hidinggroupend"
				),	
			
			array(
					'label' => __('Spaced', 'sr_avoc_theme'),
					'desc' => 'Do you want spacing between the images',
					'id' => 'spaced',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' => __('Yes', 'sr_avoc_theme'), 
								'value'=> 'yes'),
						array(	'name' =>__('No', 'sr_avoc_theme'), 
								'value' => 'no')
						)
			),
			
			array(
					'label' => __('Lightbox', 'sr_avoc_theme'),
					'desc' => 'Do you want to activate the lightbox option',
					'id' => 'lightbox',
					'type' => 'select',
					'sendval' => true,
					'option' => array( 
						array(	'name' => __('No', 'sr_avoc_theme'), 
								'value'=> 'no'),
						array(	'name' =>__('Yes', 'sr_avoc_theme'), 
								'value' => 'yes')
						)
			),
			
		)
	)
);

function sr_show_meta_pagebuilder() {  
	global $sr_meta_pagebuilder, $post; 
	
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_pagebuilder_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />'; 
	sr_write_pagebuilder($sr_meta_pagebuilder);
}




/*-----------------------------------------------------------------------------------*/
/*	WRITE PAGEBUILDER
/*-----------------------------------------------------------------------------------*/
function sr_write_pagebuilder($pagebuildermeta) {
	global $sr_prefix, $post; 
	
	/* Bugfix for export/import */
	$json = str_replace("\\\\", "\\", get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true));
	
	$classActive = ''; if (get_post_meta($post->ID, $sr_prefix.'_pagebuilder_active', true) == 'yes') { $classActive = 'active'; }
	echo '<div id="sr-pagebuilder" class="'.$classActive.'">';
	
	// Main Textareas
	echo '<div class="fieldareas">';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder" id="'.$sr_prefix.'_pagebuilder">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder', true).'</textarea>';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_json" id="'.$sr_prefix.'_pagebuilder_json">'.$json.'</textarea>';
	
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_backup_one" id="'.$sr_prefix.'_pagebuilder_backup_one">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder', true).'</textarea>';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_json_backup_one" id="'.$sr_prefix.'_pagebuilder_json_backup_one">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true).'</textarea>';
	echo '<textarea name="'.$sr_prefix.'_pagebuilder_json_backup_one_tmp" id="'.$sr_prefix.'_pagebuilder_json_backup_one_tmp">'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true).'</textarea>';
	echo '</div>';
	
	
	// Activate Pagebuilder
	echo '<input type="hidden" name="'.$sr_prefix.'_pagebuilder_active" class="'.$sr_prefix.'_pagebuilder_active" id="'.$sr_prefix.'_pagebuilder_active" value="'.get_post_meta($post->ID, $sr_prefix.'_pagebuilder_active', true).'">';
	echo '<a href="#" class="sr-enable-pagebuilder">Activate Pagebuilder</a>';
	echo '<a href="#" class="sr-disable-pagebuilder">Deactivate Pagebuilder</a>';
	
	
	
	
	
	// 		********
	
	//		Pagebuilder VISUAL
	
	// 		********	
	echo '<div id="sr-pagebuilder-visual" class="sortable-container">';
	
	if (get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json', true) !== '') {
	$json = json_decode($json);
	if($json) {
	foreach($json->section as $section) {	
		
		switch($section->shortcode) {
			
	
			// text
			case 'text':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				
				echo '<div class="visualsection '.$section->shortcode.'">
					<div class="action-bar"><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a><a href="#" class="delete-section"></a></div>
					<textarea class="shortcode shortcode-start">'.$thisContent.'</textarea>
					<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<span>Text / Editor</span>
				</div>';
			break;
			
			// spacer
			case 'spacer':
				echo '<div class="visualsection '.$section->shortcode.'">
					<div class="action-bar"><a href="#" class="delete-section"></a><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a></div>';
				
				$size = '';	
				echo '<textarea class="shortcode shortcode-start">[spacer ';
				foreach ($section->options as $o) {
					if ($o->oName == 'size') { $size = $o->oVal;}
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<span>Spacer ('.$size.')</span>
				<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>
				</div>';
			break;
			
			
			// teammemeber
			case 'sr-teammember':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				
				echo '<div class="visualsection '.$section->shortcode.'">
					<div class="action-bar"><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a><a href="#" class="delete-section"></a></div>';
				$thisContent = false;	
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal; } else {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; }
				}
				echo ']'.$thisContent.'</textarea>';	
				echo '	<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<span>Team Member</span>';
			break;
			
			// /teammember (end team member)
			case '/sr-teammember':
				echo '<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea></div>';
			break;
			
			
			// googlemap
			case 'sr-googlemap':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				
				echo '<div class="visualsection '.$section->shortcode.'">
					<div class="action-bar"><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a><a href="#" class="delete-section"></a></div>';
				$thisContent = false;	
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal; } else {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; }
				}
				echo ']'.$thisContent.'</textarea>';	
				echo '	<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<span>Google Map</span>';
			break;
			
			// /googlemap (end googlemap)
			case '/sr-googlemap':
				echo '<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea>
				<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>
				</div>';
			break;
			
			
			// columns
			case 'col':
				
				$size = '';
				$shortcode = $section->shortcode;
				foreach ($section->options as $o) {
					if ($o->oName == 'size') { $size = $o->oVal;}
					$shortcode .= ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				$jsonContent = json_encode($section)	;
				
				echo '<div class="col '.$size.'">
								<textarea class="shortcode shortcode-start">['.$shortcode.']</textarea>
								<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<div class="element-container col-inner">';
			break;
			
			// /columns (end columns)
			case '/col':
				echo '<a class="sr-add-element sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-element">Insert Element</a></div>
				<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea>
				</div>';
			break;
			
			// columnsection
			case 'columnsection':
				echo '<div class="visualsection '.$section->shortcode.' sr-clearfix">';
				
				$wrapperVal = '';
				echo '<textarea class="shortcode shortcode-start">[columnsection ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
					if ($o->oName == 'wrapper') { $wrapperVal = $o->oVal; }
				}
				echo ']</textarea>';
				
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				
				echo '<div class="action-bar"><a href="#" class="delete-section"></a><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a></div>
						<div class="columns '.$wrapperVal.' sr-clearfix">';
			break;
			
			// /columnsection
			case '/columnsection':
				echo '</div>
						<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>
						<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea>
					</div>';
			break;
			
			
			// horizontalsection
			case 'horizontalsection':
				echo '<div class="visualsection '.$section->shortcode.' sr-clearfix">';
				
				echo '<textarea class="shortcode shortcode-start">[horizontalsection ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				
				echo '<div class="action-bar"><a href="#" class="delete-section"></a><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a></div>
						<div class="horizontal-inner sortable-container-inner">';
			break;
			
			// /horizontalsection
			case '/horizontalsection':
				echo '
							<a class="sr-add-first-row sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-row">Add Row</a>
						</div>
						
						<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>
						<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea>
					</div>';
			break;
			
			
			// wolf
			case 'wolf':
				echo '<div class="visualsection '.$section->shortcode.' sr-clearfix">';
				
				$wrapperVal = '';
				echo '<textarea class="shortcode shortcode-start">[wolf ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"';
					if ($o->oName == 'wrapper') { $wrapperVal = $o->oVal; } 
				}
				echo ']</textarea>';
				
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				
				echo '<div class="action-bar"><a href="#" class="delete-section"></a><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a></div>
						<div class="wolf-inner '.$wrapperVal.' sr-clearfix">';
			break;
			
			// /wolf
			case '/wolf':
				echo '
							<a class="sr-add-wolfitem sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-wolfitem">Insert Wolf Item</a>
						</div>
						
						<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>
						<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea>
					</div>';
			break;
			
			
			// wolfitem
			case 'wolfitem':
			
				$thisContent =  '';
				$size = '';
				$shortcode = $section->shortcode;
				foreach ($section->options as $o) {
					if ($o->oName == 'size') { $size = $o->oVal; }
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
					else { $shortcode .= ' '.$o->oName.'="'.$o->oVal.'"'; }
				}
				$jsonContent = json_encode($section)	;
				
				if ($size !== "null") {
				// some users had problems with enpty/null wolf items (maybe a duplicator plugin, see also js)
				echo '<div class="visualsection '.$section->shortcode.' '.$size.' sr-clearfix">';
				echo '<textarea class="shortcode shortcode-start">['.$shortcode.']'.$thisContent.'</textarea>';
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<div class="action-bar"><a href="#" class="delete-section"></a><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a></div>';
				} else {
				echo '<div class="empty-wolf" style="display:none;">';	
				//echo '<textarea class="shortcode">[wolfitem]</textarea>';
				}
			break;
			
			// /wolfitem
			case '/wolfitem':
				echo '	<span>Wolf item</span>
						<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.$section->shortcode.'"}</textarea>
					</div>';
			break;
			
			
			// text
			case 'sr-slider':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				
				echo '<div class="visualsection '.$section->shortcode.'">
					<div class="action-bar"><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a><a href="#" class="delete-section"></a></div>';
				echo '<textarea class="shortcode shortcode-start">[sr-slider ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<span>Slider</span>
				</div>';
			break;
			
			
			// sr-gallery
			case 'sr-gallery':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				
				echo '<div class="visualsection '.$section->shortcode.'">
					<div class="action-bar"><a href="#sr-pagebuilder-popup-'.$section->shortcode.'" class="edit-section"></a><a href="#" class="delete-section"></a></div>';
				echo '<textarea class="shortcode shortcode-start">[sr-gallery ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<span>Gallery</span>
				<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>
				</div>';
			break;
			
			
			
		} // END switch
		} // END foreach section
		
		echo '<a class="sr-add-first-row sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-row">Add Row</a>';
	} else {
		// If json has error
		$jsonBackup = str_replace("\\\\", "\\", get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true));	
		$jsonBackup = json_decode($jsonBackup);
		if (get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true) && get_post_meta($post->ID, $sr_prefix.'_pagebuilder_json_backup_one', true) !== '' && $jsonBackup) {
		
		echo '<div class="pagebuilder-message alert-message">Unfortunately something went wrong.<br>It\'s recommended to retsore the pagebuilder in order not to loose your previous savings.</div>';	
		echo '<input type="hidden" name="sr-pagebuilder-restore" id="sr-pagebuilder-restore" value="false">';
		echo '<a href="#" id="restore-pagebuilder">Restore Now</a>';
		} else {
			echo '<div class="pagebuilder-message alert-message">Unfortunately something went wrong and the different pagebuilder elements have errors and can\'t be shown here, although it might display fine on your frontend.<br><br>You need to recreate the different elements.</div>';	
			echo '<a class="sr-add-first-row sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-row">Add Row</a>';
		}
	}
	
	} else { 
		// Pagebuilder is empty
		echo '<a class="sr-add-first-row sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-row">Add Row</a>';
	}
		
	echo '</div>'; // END #sr-pagebuilder-visual
	// 		********
	
	//		Pagebuilder VISUAL
	
	// 		********	

			
			
	
	
	// 		********
	
	//		Pagebuilder POPUP ($sr_meta_pagebuilder)
	
	// 		********
	echo '<div id="sr-pagebuilder-popup-bg"></div>';
	
	
	/* Popup Add Row */
	echo '<div id="sr-pagebuilder-popup-row" class="sr-pagebuilder-popup">';
	echo '<div class="popup-title">Add Row <a class="close-popup" href="#">close</a></div>';
	echo '<div class="popup-inner">';
	foreach ($pagebuildermeta as $row) {
		if (strpos($row['type'],'row') !== false) echo '<a href="#sr-pagebuilder-popup-'.$row['id'].'" class="popup-add-row sr-open-popup '.$row['id'].'">'.$row['title'].'</a>';
	}
	echo '</div>';
	echo '</div>';
	/* Popup Add Row */
	
	
	
	/* Popup Add Element */
	echo '<div id="sr-pagebuilder-popup-element" class="sr-pagebuilder-popup">';
	echo '<div class="popup-title">Insert Element <a class="close-popup" href="#">close</a></div>';
	echo '<div class="popup-inner">';
	foreach ($pagebuildermeta as $row) {
		if (strpos($row['type'],'element') !== false) echo '<a href="#sr-pagebuilder-popup-'.$row['id'].'" class="popup-add-element sr-open-popup">'.$row['title'].'</a>';
	}
	echo '</div>';
	echo '</div>';
	/* Popup Add Element */
	
	
	
	/* Popup Rows & Elements */
	foreach ($pagebuildermeta as $meta) {
		
		echo '<div id="sr-pagebuilder-popup-'.$meta['id'].'" class="sr-pagebuilder-popup sr-pagebuilder-popup-option" data-name="'.$meta['id'].'">';
		echo '<div class="popup-title">'.$meta['title'].' <a class="close-popup" href="#">close</a></div>';
		echo '<div class="popup-inner">';
		
			// create fields
			foreach ($meta['fields'] as $field) {
				
				
				if ($field['type'] == 'info') {
					echo '<div class="builder-info">'.$field['desc'].'</div>';
				} else if ($field['type'] == 'title') {
					echo '<div class="builder-title"><h1><strong>'.$field['desc'].'</strong></h1></div>';
				} else if ($field['type'] == 'hidinggroupstart') {
					$relatedArray = explode(' ',$field['hiding']);
					$hideClass = '';
					foreach ($relatedArray as $r) { $hideClass .= $field['id'].'_'.$r.' '; }
					echo '<div class="hidinggroup hide'.$field['id'].' '.$hideClass.'">';
				} else if ($field['type'] == 'hidinggroupend') {
					echo '</div>';
				} else if ($field['type'] == 'dynamicitemliststart') {
					echo '<div class="sr-dynamic-item-list">';
					echo '	<div class="sr-item">
							<div class="item-title">'.$field['label'].'<a href="#" class="delete-item"></a><a href="#" class="edit-item"></a></div>
							<div class="item-inner">';
				} else if ($field['type'] == 'dynamicitemlistend') {
					echo '</div>';
					echo '</div>';
					echo '<a href="" class="sr-add-item">Add '.$field['label'].'</a>';
					echo '</div>';
				} else {
				
				$default = '';
				if (isset($field['default']) && $field['default'] !== '') { $default = $field['default']; }
				
				$sendVal = ''; $formDisable = ''; if ($field['sendval']) { $sendVal = ' send-val'; } else { $formDisable = 'disable-on-edit'; }
				
				echo '<div class="form-row row-'.$field['type'].' '.$formDisable.'">';
				
				$formValClass = '';
				if ($field['type'] !== 'editor') {
				echo '<label for="'.$field['id'].'"><b>'.$field['label'].'</b></label>';
				} else { $formValClass = 'editor-val'; }
				
				
				echo '<div class="form-val '.$formValClass.'">';
				switch($field['type']) {
					
					// text
    				case 'text':
						echo '<input type="text" name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="builder'.$field['id'].' '.$sendVal.'" value="'.$default.'" size="30" data-default="'.$default.'" />';
					break;
					
					// textarea
    				case 'textarea':
						echo '<textarea name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="builder'.$field['id'].' '.$sendVal.'">'.$default.'</textarea>';
					break;
					
					// editor
    				case 'editor':
						wp_editor( '', $meta['id'].'-'.$field['id'],array('textarea_rows' => 13,'editor_class' => $sendVal));
					break;
										
					
					//color
					case "color":
						echo '<input type="text" name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="builder'.$field['id'].' sr-color-field '.$sendVal.'" />';
					break;
					
					// select
					case 'select':  
					    echo '<div class="select">
								<select name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="builder'.$field['id'].' '.$sendVal.'">';
						foreach ($field['option'] as $var) {
							echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
						}			  
						echo '</select></div>';   
					break;	
					
					// select-hiding
					case 'select-hiding':  
					    echo '<div class="select-hiding">
								<select name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="builder'.$field['id'].' '.$sendVal.'">';
						foreach ($field['option'] as $var) {
							echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
						}			  
						echo '</select></div>';   
					break;	
					
					// custom-select
					case 'custom-select':  
					    echo '<div class="custom-select">
								<select name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="builder'.$field['id'].' '.$sendVal.'">';
						foreach ($field['option'] as $var) {
							echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
						}			  
						echo '</select>';
						
						echo '<ul class="sr-clearfix">';
						foreach ($field['option'] as $var) {
							echo '<li data-rel="'.$var['value'].'"><img src="'.get_template_directory_uri().'/theme-admin/pagebuilder/img/'.$var['img'].'" /></li>';
						}
						echo '</ul>';
						
						echo '</div>';   
					break;
					
					// image  
					case 'image':  
						echo '	<div class="single-image">
								<input class="upload_image builder'.$field['id'].' '.$sendVal.'" type="text" name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" value="" size="30" />
								<input class="add_singleimage sr-button" type="button" value="Add Image" /><br />
								<span class="preview_image"><img class="'.$field['id'].'"  src="" alt="" /></span>
						</div>';		
					break;
					
					
					// gallery  
					case 'gallery':  
						echo '<div id="sortable'.$field['id'].'" class="sortable-medias">';
						echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_avoc_theme').'" />
								<textarea name="builder-'.$meta['id'].''.$field['id'].'" id="'.$meta['id'].'-'.$field['id'].'" class="media-gallery builder'.$field['id'].' '.$sendVal.'" style="display:none;"></textarea>';
						echo '<ul id="sortable" class="media-elements">';		
					    echo '</ul>';
						echo '</div>';				
					break;
					
					
				} // END switch
				echo '<br><span class="sr_description">'.$field['desc'].'</span>';
				echo '</div>'; // End .form-val
				
				echo '<div style="clear:both;"></div></div>'; // END form-row
				
				} // END else hidinggroup
				
			} // END foreach create fields
			
			echo '
				<div class="pagebuilder-insert">
					<a href="'.$meta['id'].'" id="insertbuilder_'.$meta['id'].'" class="sr-builder-insert">'.__("Add Element", 'sr_avoc_theme').'</a>
					<a href="'.$meta['id'].'" id="editbuilder_'.$meta['id'].'" class="sr-builder-edit">'.__("Edit Element", 'sr_avoc_theme').'</a>
				</div>'; // END op-content
			
		echo '</div>';
		echo '</div>';
	
	} // END foreach ($pagebuildermeta as $meta) {
	
	// 		********
	
	//		Pagebuilder POPUP ($sr_meta_pagebuilder)
	
	// 		********	
	
		
			
	
	echo '</div>'; // END #sr-pagebuilder
	
	
	
	
	
	
	
	
}




/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/
add_action( 'save_post', 'sr_pagebuilder_save_postdata' );
function sr_pagebuilder_save_postdata( $post_id ) {
	global $sr_prefix; 
	
	// verify nonce  
    if (!isset($_POST['meta_pagebuilder_nonce']) || !wp_verify_nonce($_POST['meta_pagebuilder_nonce'], basename(__FILE__))) 
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
	
	
	// check if restore
	if (isset($_POST['sr-pagebuilder-restore']) && $_POST['sr-pagebuilder-restore'] == 'true') {
		
		// restore the main fields
		update_post_meta($post_id, $sr_prefix.'_pagebuilder', get_post_meta($post_id, $sr_prefix.'_pagebuilder_backup_one', true));
		update_post_meta($post_id, $sr_prefix.'_pagebuilder_json',$_POST[$sr_prefix.'_pagebuilder_json_backup_one_tmp']);
		update_post_meta($post_id, $sr_prefix.'_pagebuilder_active', 'yes');
		
	} else {
	
		$saveFields = array($sr_prefix.'_pagebuilder',$sr_prefix.'_pagebuilder_json',$sr_prefix.'_pagebuilder_backup_one',$sr_prefix.'_pagebuilder_json_backup_one',$sr_prefix.'_pagebuilder_active');
		// loop through fields and save the data  
		foreach ($saveFields as $field) {  
			$old = get_post_meta($post_id, $field, true);  
			$new = $_POST[$field];
			
			/* Bugfix for export/import */
			if ($field == $sr_prefix.'_pagebuilder_json') {
				//echo $field.' = '.$new; 
				$new = str_replace("\\\\", "\\\\\\", $_POST[$field]);	
				//echo '<br><br><br>'.$new; 
			} 
			
			if ('' == $new && $old) {  
				delete_post_meta($post_id, $field);  
			} else if ($new !== $old) {  
				update_post_meta($post_id, $field, $new);  
			}  
		} // end foreach 
	
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Register and load function javascript
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_pagebuilder_scripts' ) ) {
    function sr_pagebuilder_scripts($hook) {
		global $sr_version; 
		
		wp_register_script('pagebuilder-script', get_template_directory_uri() . '/theme-admin/pagebuilder/js/pagebuilder.js', '', $sr_version,true);
		wp_enqueue_script('pagebuilder-script');
		
		wp_register_style('pagebuilder-style', get_template_directory_uri() . '/theme-admin/pagebuilder/css/pagebuilder.css', '', $sr_version);
		wp_enqueue_style('pagebuilder-style');
    }
    add_action('admin_enqueue_scripts','sr_pagebuilder_scripts',10,1);
}



?>