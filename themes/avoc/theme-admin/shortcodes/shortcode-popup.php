<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access WordPress
require_once( $path_to_wp . '/wp-load.php' );



$sc = 'sc';
/*-----------------------------------------------------------------------------------*/
/*	Sections & Options
/*-----------------------------------------------------------------------------------*/

$options = array(
	
	array( "name" => __("Accordion", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "accordion",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_accordiongroup",
				   "type" => "groupstart"
				  ),
							
				array( "name" => __("Open", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_accordionopen",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" =>"No", 
									"value" => "no"),			 	
							array(	"name" =>"Yes", 
									"value" => "yes")
							)
					  ),
				
				array( "name" => __("Title", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sc."_accordiontitle",
					   "type" => "text"
					  ),
				
				array( "name" => __("Text", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_accordiontext",
					   "type" => "textarea"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_accordiongroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Accordion", 'sr_avoc_theme'),
				   "id" => $sc."_accordionduplicater",
				   "group" => $sc."_accordiongroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Accordion", 'sr_avoc_theme'),
		   	"id" => "accordion",
		    "type" => "sectionend"),
	
	
	array( "name" => __("Buttons", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "buttons",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => __("Button Size", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_buttonsize",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => __("Mini", 'sr_avoc_theme'), 
							  	"value" => "mini-button"),
						array(	"name" => __("Small", 'sr_avoc_theme'), 
							  	"value" => "small-button"),		
						array(	"name" => __("Medium", 'sr_avoc_theme'), 
							  	"value"=> "medium-button"),
						array(	"name" => __("Big", 'sr_avoc_theme'), 
							  	"value"=> "big-button")
						)
				  ),
			
			array( "name" => __("Button Color", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_buttoncolor",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => __("Default to Colored", 'sr_avoc_theme'), 
							  	"value" => "sr-button1"),
						array(	"name" => __("Colored to Dark", 'sr_avoc_theme'), 
							  	"value" => "sr-button2"),
						array(	"name" => __("White to Colored (for dark backgrounds)", 'sr_avoc_theme'), 
							  	"value" => "sr-button3"),
						array(	"name" => __("Colored to White (for dark backgrounds)", 'sr_avoc_theme'), 
							  	"value" => "sr-button4")
						)
				  ),
				  
			array( "name" => __("Button Text", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_buttontext",
				   "type" => "text"
				  ),	  					  
							  
			array( "name" => __("Go To", 'sr_avoc_theme'),
				   "desc" => "What type should the button open?",
				   "id" => $sc."_buttongoto",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => __("URL", 'sr_avoc_theme'), 
							  	"value" => "url"),
						array(	"name" => __("Page", 'sr_avoc_theme'), 
							  	"value"=> "page"),
						array(	"name" => __("Portfolio item", 'sr_avoc_theme'), 
							  	"value"=> "portfolio"),
						array(	"name" => __("Lightbox Image", 'sr_avoc_theme'), 
							  	"value"=> "image"),
						array(	"name" => __("Lightbox Video (youtube/vimeo)", 'sr_avoc_theme'), 
							  	"value"=> "video"),
						array(	"name" => __("Lightbox Video (selfhosted/mp4)", 'sr_avoc_theme'), 
							  	"value"=> "selfhosted")	
						)
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "url",
				   "type" => "hidinggroupstart"
				  ),
		
				array( "name" => __("Button URL", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_button_url_url",
					   "type" => "text"
					  ),	  
				  
				array( "name" => __("Button Target", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_button_url_target",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Same page", 'sr_avoc_theme'), 
									"value" => "_self"),
							array(	"name" => __("New Page", 'sr_avoc_theme'), 
									"value"=> "_blank")		
							)
					  ),		  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "color",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "page",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Select Page", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_button_page",
					   "type" => "pages"
					  ),		  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "page",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "portfolio",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Select Portfolio Item", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_button_portfolio",
					   "type" => "portfolio"
					  ),		  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "portfolio",
				   "type" => "hidinggroupend"
				  ),
				  				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "image",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Choose Image", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_button_video_image",
					   "type" => "image"
					  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "image",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "video",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Video URL", 'sr_avoc_theme'),
					   "desc" => "Make sure to enter the url which is provided on the embedded iframe code on 'src'<br><br>Example Vimeo: http://player.vimeo.com/video/VIMEOID<br><br>Example Youtube: http://www.youtube.com/embed/YOUTUBEID",
					   "id" => $sc."_button_video_video",
					   "type" => "text"
					  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "video",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "selfhosted",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("Video File", 'sr_avoc_theme'),
					   "desc" => "Choose your video file from media library",
					   "id" => $sc."_button_video_selfhosted",
					   "type" => "video"
					  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_buttongoto",
				   "hiding" => "selfhosted",
				   "type" => "hidinggroupend"
				  ),
			
	
	array( "name" => __("Buttons", 'sr_avoc_theme'),
		   	"id" => "buttons",
		    "type" => "sectionend"),
	
	
		
	
	array( "name" => __("Contact Form", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "contact",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("Recipient Email", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_contactsendto",
				   "type" => "text"
				  ),
			
			array( "name" => __("Subject", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_contactsubject",
				   "type" => "text"
				  ),
			
			array( "name" => __("Submit Button", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_contactsubmit",
				   "type" => "text"
				  ),
			
			array( "name" => "Group",
				   "id" => $sc."_contactgroup",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Fieltype", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_contacttype",
					   "type" => "selectbox",
					   "option" => array( 
						array(	"name" => __("Textfield", 'sr_avoc_theme'), 
							  	"value" => "textfield"),
						array(	"name" => __("Textarea", 'sr_avoc_theme'), 
							  	"value"=> "textarea")
						)
					  ),
				
				array( "name" => __("Fieldname / Label", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_contactname",
					   "type" => "text"
					  ),
				
				array( "name" => __("Slugname", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_contactslug",
					   "type" => "text"
					  ),
				
				array( "name" => __("Required field?", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_contactreq",
					   "type" => "selectbox",
					   "option" => array( 
						array(	"name" =>"Yes", 
							  	"value" => "yes"),
						array( 	"name"=>"No", 
							  	"value"=> "no")
						)
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_contactgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add FIeld", 'sr_avoc_theme'),
				   "id" => $sc."_contactduplicater",
				   "group" => $sc."_contactgroup",
				   "type" => "grouduplicater"
				  ),

	array( "name" => __("Contact Form", 'sr_avoc_theme'),
		   	"id" => "contact",
		    "type" => "sectionend"),
			
			
	
	/*
	array( "name" => __("Counter", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "counter",
		   "type" => "sectionstart"
		  ),
		  
		  	array( "name" => __("Count From", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_countfrom",
				   "type" => "text"
				  ),
			
			array( "name" => __("Count To", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_countto",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Speed", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_countspeed",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Subline", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_countsub",
				   "type" => "text"
				  ),
		  
	array( "name" => __("Counter", 'sr_avoc_theme'),
		   	"id" => "counter",
		    "type" => "sectionend"),
	*/		
			

	
	array( "name" => __("Icon", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "icon",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("Size", 'sr_avoc_theme'),
				   "desc" => '',
				   "id" => $sc."_iconsize",
				   "type" => "selectbox",
				   "option" => array(			 	
						array(	"name" =>"Normal", 
								"value" => "normal"),
						array(	"name" =>"2x", 
								"value" => "2x"),
						array(	"name" =>"3x", 
								"value" => "3x"),
						array(	"name" =>"4x", 
								"value" => "4x"),
						array(	"name" =>"5x", 
								"value" => "5x")
						)
				  ),
			
			array( 	"name" => __("Color", 'sr_avoc_theme'),
					"desc" => "",
					"id" => $sc."_iconcolor",
					"type" => "color"
				  	),
			
			array( "name" => __("Choose Icon", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_iconfont",
				   "type" => "icons"
				  ),
	
	array( "name" => __("Icon", 'sr_avoc_theme'),
		   "id" => "icon",
		    "type" => "sectionend"),
			
		
	
	
	array( "name" => __("Selfhosted Audio", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "selfhostedaudio",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("MP3 File URL", 'sr_avoc_theme'),
				   "desc" => __("The url to the mp3 file", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedaudiomp3",
				   "type" => "audio"
				  ),
			
			array( "name" => __("OGA/OGG File URL", 'sr_avoc_theme'),
				   "desc" => __("The url to the oga/ogg file", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedaudiooga",
				   "type" => "audio"
				  ),
			
			array( "name" => __("Image (Optional)", 'sr_avoc_theme'),
				   "desc" => __("Enter the url of one of your media image", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedaudiopic",
				   "type" => "image"
				  ),
			
			array( "name" => __("ID", 'sr_avoc_theme'),
				   "desc" => __("This is important if you want to add multiple audios/videos. Use a unique value.", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedaudioid",
				   "type" => "text"
				  ),
	
	array( "name" => __("selfhosted Audio", 'sr_avoc_theme'),
		   "id" => "selfhostedaudio",
		   "type" => "sectionend"),
	
	
	
	array( "name" => __("Selfhosted Video", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "selfhostedvideo",
		   "type" => "sectionstart"
		  ),
	
			array( "name" => __("M4V File URL", 'sr_avoc_theme'),
				   "desc" => __("The url to the m4v file", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedvideom4v",
				   "type" => "video"
				  ),
			
			array( "name" => __("OGA/OGG File URL", 'sr_avoc_theme'),
				   "desc" => __("The url to the oga/ogg file", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedvideooga",
				   "type" => "video"
				  ),
			
			array( "name" => __("WEBMV File URL", 'sr_avoc_theme'),
				   "desc" => __("The url to the webmv file", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedvideowebmv",
				   "type" => "video"
				  ),
			
			array( "name" => __("Image (Optional)", 'sr_avoc_theme'),
				   "desc" => __("Choose an image", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedvideopic",
				   "type" => "image"
				  ),
			
			array( "name" => __("ID", 'sr_avoc_theme'),
				   "desc" => __("This is important if you want to add multiple audios/videos. Use a unique value.", 'sr_avoc_theme'),
				   "id" => $sc."_selfhostedvideoid",
				   "type" => "text"
				  ),
	
	array( "name" => __("selfhosted Video", 'sr_avoc_theme'),
		   "id" => "selfhostedvideo",
		   "type" => "sectionend"),
	
	
	
	array( "name" => __("Skills", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "skills",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_skillgroup",
				   "type" => "groupstart"
				  ),
				
				array( "name" => __("Percent Amount", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sc."_skillpercent",
					   "type" => "text"
					  ),
				
				array( "name" => __("Name", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_skillname",
					   "type" => "text"
					  ),
				
				array( "name" => __("Color", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_skillcolor",
					   "type" => "color"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_skillgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Skill", 'sr_avoc_theme'),
				   "id" => $sc."_skillduplicater",
				   "group" => $sc."_skillgroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Skills", 'sr_avoc_theme'),
		   	"id" => "skills",
		    "type" => "sectionend"),
	
	
	array( "name" => __("Social Links", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "social",
		   "type" => "sectionstart"
		  ),
		  
		  	array( "name" => __("Facebook", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_facebook",
				   "type" => "text"
				  ),
				  	  
			array( "name" => __("Twitter", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_twitter",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Behance", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_behance",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Dribbble", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_dribbble",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Google", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_google",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Instagram", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_instagram",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Tumblr", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_tumblr",
				   "type" => "text"
				  ),
				  
			array( "name" => __("LinkedIn", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_linkedin",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Vk", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_vk",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Soundcloud", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_social_soundcloud",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Website Link", 'sr_avoc_theme'),
				   "desc" => "make sure to start with http://",
				   "id" => $sc."_social_website",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Mail adress", 'sr_avoc_theme'),
				   "desc" => "just enter the email adress",
				   "id" => $sc."_social_mail",
				   "type" => "text"
				  ),
				  
			array( "name" => __("Alignment", 'sr_avoc_theme'),
					"desc" => "",
					"id" => $sc."_social_alignment",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"Left", "value" => "left"),
						array(	"name" =>"Center", "value" => "center"),
						array(	"name" =>"Right", "value" => "right")
						)
				  ),	
			
		  
	array ( "name" => __("Social Links", 'sr_avoc_theme'),
		   	"id" => "social",
		    "type" => "sectionend"),
	
	
	array( "name" => __("Spacer / Margin", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "spacer",
		   "type" => "sectionstart"
		  ),
	
		array( "name" => __("Size", 'sr_avoc_theme'),
				   "desc" => '',
				   "id" => $sc."_spacersize",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"Mini (20px)", 
								"value" => "mini"),
						array(	"name" =>"Small (40px)", 
								"value" => "small"),	
						array(	"name" =>"Medium (120px)", 
								"value" => "medium"),
						array(	"name" =>"Big (160px)", 
								"value" => "big")
						)
				  ),
	
	array( "name" => __("Spacer", 'sr_avoc_theme'),
		   "id" => "spacer",
		   "type" => "sectionend"
		  ),	
		  
		  
			
	array( "name" => __("Subtitle", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "titlesub",
		   "type" => "sectionstart"
		  ),
		  			
		  	array( "name" => "",
				   "desc" => "This will use the subtitle font you choosed in the theme options.<br> Alterntively you can also the default 'Heading' option of the tinymce editor and add the class 'alttitle' to this heading in the text editor.",
				   "id" => $sc."_subtitle_info",
				   "type" => "infotext"
				  ),
				  
			array( "name" => __("Title Name", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_subtitle_name",
				   "type" => "text"
				  ),
				  				  
		  	array( "name" => __("Size", 'sr_avoc_theme'),
					"desc" => "",
					"id" => $sc."_subtitle_size",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"h1", "value" => "h1"),
						array(	"name" =>"h2", "value" => "h2"),
						array(	"name" =>"h3", "value" => "h3"),
						array(	"name" =>"h4", "value" => "h4"),
						array(	"name" =>"h5", "value" => "h5"),
						array(	"name" =>"h6", "value" => "h6")
						)
				  ),
				  				  
				  
			array( "name" => __("Title Alignment", 'sr_avoc_theme'),
					"desc" => "",
					"id" => $sc."_subtitle_alignment",
					"type" => "selectbox",
					"option" => array(			 	
						array(	"name" =>"Auto", "value" => "auto"),
						array(	"name" =>"Center", "value" => "center"),
						array(	"name" =>"Right", "value" => "right")
						)
				  ),	
		  
	array( "name" => __("Subtitle", 'sr_avoc_theme'),
		   "id" => "titlesub",
		   "type" => "sectionend"),
		   		
		  
	
	
	array( "name" => __("Tabs", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "tab",
		   "type" => "sectionstart"
		  ),
			
			array( "name" => "Group",
				   "id" => $sc."_tabgroup",
				   "type" => "groupstart"
				  ),
			
				array( "name" => __("Tab Name", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sc."_tabname",
					   "type" => "text"
					  ),
				
				array( "name" => __("Tab Text", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_tabtext",
					   "type" => "textarea"
					  ),
			
			array( "name" => "Groupend",
				   "id" => $sc."_tabgroup",
				   "type" => "groupend"
				  ),
			
			array( "name" => __("Add Tab", 'sr_avoc_theme'),
				   "id" => $sc."_tabduplicater",
				   "group" => $sc."_tabgroup",
				   "type" => "grouduplicater"
				  ),

	array ( "name" => __("Tabs", 'sr_avoc_theme'),
		   	"id" => "tab",
		    "type" => "sectionend"),
			
		
	
	array( "name" => __("Toggle", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "toggle",
		   "type" => "sectionstart"
		  ),
	
			
			array( "name" => __("Toggle Open", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_toggleopen",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" =>"No", 
							  	"value" => "no"),			 	
						array(	"name" =>"Yes", 
							  	"value" => "yes")
						)
				  ),
	
			array( "name" => __("Toggle Title", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_toggletitle",
				   "type" => "text"
				  ),
			
			array( "name" => __("Toggle Text", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_toggletext",
				   "type" => "textarea"
				  ),
						
	
	array( "name" => __("Toggle", 'sr_avoc_theme'),
		   "id" => "toggle",
		    "type" => "sectionend"),
			
	
	array( "name" => __("Video", 'sr_avoc_theme'),
		   "desc" => "",
		   "id" => "video",
		   "type" => "sectionstart"
		  ),
		  
		  array( "name" => __("Video Type", 'sr_avoc_theme'),
				   "desc" => "",
				   "id" => $sc."_videotype",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => __("Inline Video", 'sr_avoc_theme'), 
							  	"value" => "inline"),
						array(	"name" => __("Lightbox", 'sr_avoc_theme'), 
							  	"value"=> "lightbox")	
						)
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_videotype",
				   "hiding" => "inline",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("", 'sr_avoc_theme'),
					   "desc" => "<strong>A inline video will display a placeholder image with play button.</strong>",
					   "id" => "",
					   "type" => "infotext"
					  ),
					  
				array( "name" => __("Placeholder Image", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_video_inline_image",
					   "type" => "image"
					  ),	
					  
				array( "name" => __("Youtube or Vimeo", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sc."_video_inline_type",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" =>"Youtube", 
									"value" => "youtube"),			 	
							array(	"name" =>"Vimeo", 
									"value" => "vimeo")
							)
					  ),
					  
				array( "name" => __("Video ID", 'sr_avoc_theme'),
					   "desc" => "Add the ID of your youtube / vimeo video",
					   "id" => $sc."_video_inline_id",
					   "type" => "text"
					  ),	
					  
				array( "name" => __("Text (optional)", 'sr_avoc_theme'),
					   "desc" => "Add some optional text.",
					   "id" => $sc."_video_inline_button",
					   "type" => "text"
					  ),		  
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_videotype",
				   "hiding" => "inline",
				   "type" => "hidinggroupend"
				  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_videotype",
				   "hiding" => "lightbox",
				   "type" => "hidinggroupstart"
				  ),
				  
				array( "name" => __("", 'sr_avoc_theme'),
					   "desc" => "<strong>Use the Button shortcode and choose the lightbox option.</strong>",
					   "id" => "",
					   "type" => "infotext"
					  ),
				  
			array( "name" => "Hidinggroup",
				   "id" => $sc."_videotype",
				   "hiding" => "lightbox",
				   "type" => "hidinggroupend"
				  ),
			
	array( "name" => __("Video", 'sr_avoc_theme'),
		   "id" => "video",
		    "type" => "sectionend")		
			
);
?>
<!DOCTYPE html>
<html>
<head>
<title>Shortcodes</title>

<!--style-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/theme-admin/'; ?>shortcodes/css/shortcodes-style.css?ver=1.0.0" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/files/'; ?>css/font-awesome.min.css?ver=4.3.0" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/files/'; ?>css/ionicons.css" />

<!--scripts-->
<script src="<?php echo get_template_directory_uri() . '/theme-admin/'; ?>shortcodes/js/shortcode-functions.js?ver=1.7"></script>


</head>

<body>	

<div id="shortcodes">

	<div class="sc_option_panel">
    	<ul class="sc_list">
		<?php 
        
        foreach ($options as $opt) {
            if ($opt['type'] == 'sectionstart') {
                echo '<li class="'.$opt['id'].'"><a href="'.$opt['id'].'"><b>'.$opt['name'].'</b></a></li>';	 
            }
        }
        
        ?>
		</ul>
	</div> <!-- END .sc_option_panel -->

	
    <div class="sc_option">
    	<?php 
        
        foreach ($options as $option) {
            switch ( $option['type'] ) {
		
			//sectionstart
			case "sectionstart":
				echo '	<div id="'.$option['id'].'" class="sc-option-content">
						<div class="sc-option-title"><b>'.$option['name'].'</b><br /><span><i>'.$option['desc'].'</i></span></div>
						<form id="form_'.$option['id'].'" action="" method="get" accept-charset="utf-8">
						';
			break;
			
			//sectionend
			case "sectionend":
				echo '	<a href="" id="insert_'.$option['id'].'" class="submit">'.__("Insert", 'sr_avoc_theme').'</a> 
						</form>
						</div>';
			break;
			
			//groupstart
			case "groupstart":
				echo '	<div id="'.$option['id'].'" class="group">';
			break;
			
			//groupend
			case "groupend":
				echo '	</div>';
			break;
			
			//groupstart
			case "hidinggroupstart":
				echo '	<div id="'.$option['id'].'" class="group hidinggroup hide'.$option['id'].' '.$option['id'].'_'.$option['hiding'].'">';
			break;
			
			//groupend
			case "hidinggroupend":
				echo '	</div>';
			break;
			
			//grouduplicater
			case "grouduplicater";
				echo '	<a href="'.$option['group'].'" id="'.$option['id'].'" class="groupduplicater">&raquo; '.$option['name'].'</a><br>';
			break;
			
			//infotext
			case "infotext":
				echo '<div id="'.$option['id'].'" class="sc-option sc-infotext clear">';
					echo '<p>'.$option['desc'].'</p>';
				echo '</div>';
			break;
			
			//text
			case "text":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="" size="30" />
							</div>';
				echo '</div>';
			break;
			
			// selectbox  
			case 'selectbox':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$i = 0;
								foreach ($option['option'] as $var) {
									echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
								$i++;	
								}			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			
			// selectbox-hiding 
			case 'selectbox-hiding':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value select-hiding">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$i = 0;
								foreach ($option['option'] as $var) {
									echo '<option value="'.$var['value'].'"> '.$var['name'].'</option>';
								$i++;	
								}			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			//textarea
			case "textarea":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<textarea name="'.$option['id'].'" id="'.$option['id'].'"></textarea>
							</div>';
				echo '</div>';
			break;
			
			//color
			case "color":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="" class="sr-color-field" />
							</div>';
				echo '</div>';
			break;
			
			//radiocustom
			case "radiocustom":
				echo '<div id="'.$option['id'].'" class="sc-option clear radiocustom">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">';
					
					$i = 0;
					foreach ($option['option'] as $var) {
						echo '<input type="radio" name="'.$option['id'].'" id="'.$var['value'].'" value="'.$var['value'].'" />
						<a class="customradio '.$var['value'].'" href="'.$var['value'].'"><span>'.$var['name'].'</span></a>';
					$i++;	
					}
	
					echo '	</div>';		
				echo '</div>';
			break;
			
			//image
			case "image":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value single-image">
								<span class="preview-image"><img src="test" /></span>
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="" style="display:none;" />
								<a href="#" class="upload-sc-image">'.__('Add Image', 'sr_avoc_theme').'</a>
								<a href="#" class="remove-sc-image" style="display: none;">' . __('Remove Image', 'sr_avoc_theme') . '</a>
							</div>';
				echo '</div>';
			break;
			
			//video
			case "video":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value single-image">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value=""/>
								<a href="#" class="upload-sc-video">'.__('Add Video', 'sr_avoc_theme').'</a>
								<a href="#" class="remove-sc-video" style="display: none;">' . __('Remove Video', 'sr_avoc_theme') . '</a>
							</div>';
				echo '</div>';
			break;
			
			//audio
			case "audio":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value single-image">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value=""/>
								<a href="#" class="upload-sc-audio">'.__('Add Audio', 'sr_avoc_theme').'</a>
								<a href="#" class="remove-sc-audio" style="display: none;">' . __('Remove Audio', 'sr_avoc_theme') . '</a>
							</div>';
				echo '</div>';
			break;
			
			//video
			case "video":
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value single-image">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value=""/>
								<a href="#" class="upload-sc-video">'.__('Add Video', 'sr_avoc_theme').'</a>
								<a href="#" class="remove-sc-video" style="display: none;">' . __('Remove Video', 'sr_avoc_theme') . '</a>
							</div>';
				echo '</div>';
			break;
			
			// pages  
			case 'pages':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$pages = get_pages();
								  foreach ( $pages as $p ) {
									if ($p->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									$option = '<option value="' . $p->ID . '" '.$active.'>';
									$option .= $p->post_title;
									$option .= '</option>';
									echo $option;
								  }			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			
			// portfolio  
			case 'portfolio':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<div class="sc-option-name">
								<label for="'.$option['id'].'">'.$option['name'].'</label><br /><span class="sc-description">'.$option['desc'].'</span>
							</div>';
					echo '	<div class="sc-option-value">
								<select name="'.$option['id'].'" id="'.$option['id'].'">';
								$pages = get_posts(array('post_type' => 'portfolio', 'posts_per_page'=> -1));
								  foreach ( $pages as $p ) {
									if ($p->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									$option = '<option value="' . $p->ID . '" '.$active.'>';
									$option .= $p->post_title;
									$option .= '</option>';
									echo $option;
								  }			  
					echo '		</select> 
							</div>';
				echo '</div>';
			break;
			
			
			
			// medias  
			case 'medias':  
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					
					echo '<div id="sortable'.$option['id'].'" class="sortable-medias-shortcode">';
					echo '	<input class="add_image button" type="button" value="'.__("Add Images", 'sr_avoc_theme').'" />
							<textarea name="'.$option['id'].'" id="'.$option['id'].'" style="display:none;" class="media-value"></textarea>';
					
					echo '<ul id="sortable" class="media-elements">';
					echo '</ul>';
					echo '</div>';
							
					
				echo '</div>';
			break;
			
			
			
			
			//icons
			case "icons":
			
				$fonawesomeicons = array("fa-500px","fa-adjust","fa-adn","fa-align-center","fa-align-justify","fa-align-left","fa-align-right","fa-amazon","fa-ambulance","fa-american-sign-language-interpreting","fa-anchor","fa-android","fa-angellist","fa-angle-double-down","fa-angle-double-left","fa-angle-double-right","fa-angle-double-up","fa-angle-down","fa-angle-left","fa-angle-right","fa-angle-up","fa-apple","fa-archive","fa-area-chart","fa-arrow-circle-down","fa-arrow-circle-left","fa-arrow-circle-o-down","fa-arrow-circle-o-left","fa-arrow-circle-o-right","fa-arrow-circle-o-up","fa-arrow-circle-right","fa-arrow-circle-up","fa-arrow-down","fa-arrow-left","fa-arrow-right","fa-arrow-up","fa-arrows","fa-arrows-alt","fa-arrows-h","fa-arrows-v","fa-assistive-listening-systems","fa-asterisk","fa-at","fa-audio-description","fa-backward","fa-balance-scale","fa-ban","fa-bar-chart","fa-barcode","fa-bars","fa-battery-empty","fa-battery-full","fa-battery-half","fa-battery-quarter","fa-battery-three-quarters","fa-bed","fa-beer","fa-behance","fa-behance-square","fa-bell","fa-bell-o","fa-bell-slash","fa-bell-slash-o","fa-bicycle","fa-binoculars","fa-birthday-cake","fa-bitbucket","fa-bitbucket-square","fa-black-tie","fa-blind","fa-bluetooth","fa-bluetooth-b","fa-bold","fa-bolt","fa-bomb","fa-book","fa-bookmark","fa-bookmark-o","fa-braille","fa-briefcase","fa-btc","fa-bug","fa-building","fa-building-o","fa-bullhorn","fa-bullseye","fa-bus","fa-buysellads","fa-calculator","fa-calendar","fa-calendar-check-o","fa-calendar-minus-o","fa-calendar-o","fa-calendar-plus-o","fa-calendar-times-o","fa-camera","fa-camera-retro","fa-car","fa-caret-down","fa-caret-left","fa-caret-right","fa-caret-square-o-down","fa-caret-square-o-left","fa-caret-square-o-right","fa-caret-square-o-up","fa-caret-up","fa-cart-arrow-down","fa-cart-plus","fa-cc","fa-cc-amex","fa-cc-diners-club","fa-cc-discover","fa-cc-jcb","fa-cc-mastercard","fa-cc-paypal","fa-cc-stripe","fa-cc-visa","fa-certificate","fa-chain-broken","fa-check","fa-check-circle","fa-check-circle-o","fa-check-square","fa-check-square-o","fa-chevron-circle-down","fa-chevron-circle-left","fa-chevron-circle-right","fa-chevron-circle-up","fa-chevron-down","fa-chevron-left","fa-chevron-right","fa-chevron-up","fa-child","fa-chrome","fa-circle","fa-circle-o","fa-circle-o-notch","fa-circle-thin","fa-clipboard","fa-clock-o","fa-clone","fa-cloud","fa-cloud-download","fa-cloud-upload","fa-code","fa-code-fork","fa-codepen","fa-codiepie","fa-coffee","fa-cog","fa-cogs","fa-columns","fa-comment","fa-comment-o","fa-commenting","fa-commenting-o","fa-comments","fa-comments-o","fa-compass","fa-compress","fa-connectdevelop","fa-contao","fa-copyright","fa-creative-commons","fa-credit-card","fa-credit-card-alt","fa-crop","fa-crosshairs","fa-css3","fa-cube","fa-cubes","fa-cutlery","fa-dashcube","fa-database","fa-deaf","fa-delicious","fa-desktop","fa-deviantart","fa-diamond","fa-digg","fa-dot-circle-o","fa-download","fa-dribbble","fa-dropbox","fa-drupal","fa-edge","fa-eject","fa-ellipsis-h","fa-ellipsis-v","fa-empire","fa-envelope","fa-envelope-o","fa-envelope-square","fa-envira","fa-eraser","fa-eur","fa-exchange","fa-exclamation","fa-exclamation-circle","fa-exclamation-triangle","fa-expand","fa-expeditedssl","fa-external-link","fa-external-link-square","fa-eye","fa-eye-slash","fa-eyedropper","fa-facebook","fa-facebook-official","fa-facebook-square","fa-fast-backward","fa-fast-forward","fa-fax","fa-female","fa-fighter-jet","fa-file","fa-file-archive-o","fa-file-audio-o","fa-file-code-o","fa-file-excel-o","fa-file-image-o","fa-file-o","fa-file-pdf-o","fa-file-powerpoint-o","fa-file-text","fa-file-text-o","fa-file-video-o","fa-file-word-o","fa-files-o","fa-film","fa-filter","fa-fire","fa-fire-extinguisher","fa-firefox","fa-first-order","fa-flag","fa-flag-checkered","fa-flag-o","fa-flask","fa-flickr","fa-floppy-o","fa-folder","fa-folder-o","fa-folder-open","fa-folder-open-o","fa-font","fa-font-awesome","fa-fonticons","fa-fort-awesome","fa-forumbee","fa-forward","fa-foursquare","fa-frown-o","fa-futbol-o","fa-gamepad","fa-gavel","fa-gbp","fa-genderless","fa-get-pocket","fa-gg","fa-gg-circle","fa-gift","fa-git","fa-git-square","fa-github","fa-github-alt","fa-github-square","fa-gitlab","fa-glass","fa-glide","fa-glide-g","fa-globe","fa-google","fa-google-plus","fa-google-plus-official","fa-google-plus-square","fa-google-wallet","fa-graduation-cap","fa-gratipay","fa-h-square","fa-hacker-news","fa-hand-lizard-o","fa-hand-o-down","fa-hand-o-left","fa-hand-o-right","fa-hand-o-up","fa-hand-paper-o","fa-hand-peace-o","fa-hand-pointer-o","fa-hand-rock-o","fa-hand-scissors-o","fa-hand-spock-o","fa-hashtag","fa-hdd-o","fa-header","fa-headphones","fa-heart","fa-heart-o","fa-heartbeat","fa-history","fa-home","fa-hospital-o","fa-hourglass","fa-hourglass-end","fa-hourglass-half","fa-hourglass-o","fa-hourglass-start","fa-houzz","fa-html5","fa-i-cursor","fa-ils","fa-inbox","fa-indent","fa-industry","fa-info","fa-info-circle","fa-inr","fa-instagram","fa-internet-explorer","fa-ioxhost","fa-italic","fa-joomla","fa-jpy","fa-jsfiddle","fa-key","fa-keyboard-o","fa-krw","fa-language","fa-laptop","fa-lastfm","fa-lastfm-square","fa-leaf","fa-leanpub","fa-lemon-o","fa-level-down","fa-level-up","fa-life-ring","fa-lightbulb-o","fa-line-chart","fa-link","fa-linkedin","fa-linkedin-square","fa-linux","fa-list","fa-list-alt","fa-list-ol","fa-list-ul","fa-location-arrow","fa-lock","fa-long-arrow-down","fa-long-arrow-left","fa-long-arrow-right","fa-long-arrow-up","fa-low-vision","fa-magic","fa-magnet","fa-male","fa-map","fa-map-marker","fa-map-o","fa-map-pin","fa-map-signs","fa-mars","fa-mars-double","fa-mars-stroke","fa-mars-stroke-h","fa-mars-stroke-v","fa-maxcdn","fa-meanpath","fa-medium","fa-medkit","fa-meh-o","fa-mercury","fa-microphone","fa-microphone-slash","fa-minus","fa-minus-circle","fa-minus-square","fa-minus-square-o","fa-mixcloud","fa-mobile","fa-modx","fa-money","fa-moon-o","fa-motorcycle","fa-mouse-pointer","fa-music","fa-neuter","fa-newspaper-o","fa-object-group","fa-object-ungroup","fa-odnoklassniki","fa-odnoklassniki-square","fa-opencart","fa-openid","fa-opera","fa-optin-monster","fa-outdent","fa-pagelines","fa-paint-brush","fa-paper-plane","fa-paper-plane-o","fa-paperclip","fa-paragraph","fa-pause","fa-pause-circle","fa-pause-circle-o","fa-paw","fa-paypal","fa-pencil","fa-pencil-square","fa-pencil-square-o","fa-percent","fa-phone","fa-phone-square","fa-picture-o","fa-pie-chart","fa-pied-piper","fa-pied-piper-alt","fa-pied-piper-pp","fa-pinterest","fa-pinterest-p","fa-pinterest-square","fa-plane","fa-play","fa-play-circle","fa-play-circle-o","fa-plug","fa-plus","fa-plus-circle","fa-plus-square","fa-plus-square-o","fa-power-off","fa-print","fa-product-hunt","fa-puzzle-piece","fa-qq","fa-qrcode","fa-question","fa-question-circle","fa-question-circle-o","fa-quote-left","fa-quote-right","fa-random","fa-rebel","fa-recycle","fa-reddit","fa-reddit-alien","fa-reddit-square","fa-refresh","fa-registered","fa-renren","fa-repeat","fa-reply","fa-reply-all","fa-retweet","fa-road","fa-rocket","fa-rss","fa-rss-square","fa-rub","fa-safari","fa-scissors","fa-scribd","fa-search","fa-search-minus","fa-search-plus","fa-sellsy","fa-server","fa-share","fa-share-alt","fa-share-alt-square","fa-share-square","fa-share-square-o","fa-shield","fa-ship","fa-shirtsinbulk","fa-shopping-bag","fa-shopping-basket","fa-shopping-cart","fa-sign-in","fa-sign-language","fa-sign-out","fa-signal","fa-simplybuilt","fa-sitemap","fa-skyatlas","fa-skype","fa-slack","fa-sliders","fa-slideshare","fa-smile-o","fa-snapchat","fa-snapchat-ghost","fa-snapchat-square","fa-sort","fa-sort-alpha-asc","fa-sort-alpha-desc","fa-sort-amount-asc","fa-sort-amount-desc","fa-sort-asc","fa-sort-desc","fa-sort-numeric-asc","fa-sort-numeric-desc","fa-soundcloud","fa-space-shuttle","fa-spinner","fa-spoon","fa-spotify","fa-square","fa-square-o","fa-stack-exchange","fa-stack-overflow","fa-star","fa-star-half","fa-star-half-o","fa-star-o","fa-steam","fa-steam-square","fa-step-backward","fa-step-forward","fa-stethoscope","fa-sticky-note","fa-sticky-note-o","fa-stop","fa-stop-circle","fa-stop-circle-o","fa-street-view","fa-strikethrough","fa-stumbleupon","fa-stumbleupon-circle","fa-subscript","fa-subway","fa-suitcase","fa-sun-o","fa-superscript","fa-table","fa-tablet","fa-tachometer","fa-tag","fa-tags","fa-tasks","fa-taxi","fa-television","fa-tencent-weibo","fa-terminal","fa-text-height","fa-text-width","fa-th","fa-th-large","fa-th-list","fa-themeisle","fa-thumb-tack","fa-thumbs-down","fa-thumbs-o-down","fa-thumbs-o-up","fa-thumbs-up","fa-ticket","fa-times","fa-times-circle","fa-times-circle-o","fa-tint","fa-toggle-off","fa-toggle-on","fa-trademark","fa-train","fa-transgender","fa-transgender-alt","fa-trash","fa-trash-o","fa-tree","fa-trello","fa-tripadvisor","fa-trophy","fa-truck","fa-try","fa-tty","fa-tumblr","fa-tumblr-square","fa-twitch","fa-twitter","fa-twitter-square","fa-umbrella","fa-underline","fa-undo","fa-universal-access","fa-university","fa-unlock","fa-unlock-alt","fa-upload","fa-usb","fa-usd","fa-user","fa-user-md","fa-user-plus","fa-user-secret","fa-user-times","fa-users","fa-venus","fa-venus-double","fa-venus-mars","fa-viacoin","fa-viadeo","fa-viadeo-square","fa-video-camera","fa-vimeo","fa-vimeo-square","fa-vine","fa-vk","fa-volume-control-phone","fa-volume-down","fa-volume-off","fa-volume-up","fa-weibo","fa-weixin","fa-whatsapp","fa-wheelchair","fa-wheelchair-alt","fa-wifi","fa-wikipedia-w","fa-windows","fa-wordpress","fa-wpbeginner","fa-wpforms","fa-wrench","fa-xing","fa-xing-square","fa-y-combinator","fa-yahoo","fa-yelp","fa-yoast","fa-youtube","fa-youtube-play","fa-youtube-square");
				
				$ionic = array('ion-alert','ion-alert-circled','ion-android-add','ion-android-add-circle','ion-android-alarm-clock','ion-android-alert','ion-android-apps','ion-android-archive','ion-android-arrow-back','ion-android-arrow-down','ion-android-arrow-dropdown','ion-android-arrow-dropdown-circle','ion-android-arrow-dropleft','ion-android-arrow-dropleft-circle','ion-android-arrow-dropright','ion-android-arrow-dropright-circle','ion-android-arrow-dropup','ion-android-arrow-dropup-circle','ion-android-arrow-forward','ion-android-arrow-up','ion-android-attach','ion-android-bar','ion-android-bicycle','ion-android-boat','ion-android-bookmark','ion-android-bulb','ion-android-bus','ion-android-calendar','ion-android-call','ion-android-camera','ion-android-cancel','ion-android-car','ion-android-cart','ion-android-chat','ion-android-checkbox','ion-android-checkbox-blank','ion-android-checkbox-outline','ion-android-checkbox-outline-blank','ion-android-checkmark-circle','ion-android-clipboard','ion-android-close','ion-android-cloud','ion-android-cloud-circle','ion-android-cloud-done','ion-android-cloud-outline','ion-android-color-palette','ion-android-compass','ion-android-contact','ion-android-contacts','ion-android-contract','ion-android-create','ion-android-delete','ion-android-desktop','ion-android-document','ion-android-done','ion-android-done-all','ion-android-download','ion-android-drafts','ion-android-exit','ion-android-expand','ion-android-favorite','ion-android-favorite-outline','ion-android-film','ion-android-folder','ion-android-folder-open','ion-android-funnel','ion-android-globe','ion-android-hand','ion-android-hangout','ion-android-happy','ion-android-home','ion-android-image','ion-android-laptop','ion-android-list','ion-android-locate','ion-android-lock','ion-android-mail','ion-android-map','ion-android-menu','ion-android-microphone','ion-android-microphone-off','ion-android-more-horizontal','ion-android-more-vertical','ion-android-navigate','ion-android-notifications','ion-android-notifications-none','ion-android-notifications-off','ion-android-open','ion-android-options','ion-android-people','ion-android-person','ion-android-person-add','ion-android-phone-landscape','ion-android-phone-portrait','ion-android-pin','ion-android-plane','ion-android-playstore','ion-android-print','ion-android-radio-button-off','ion-android-radio-button-on','ion-android-refresh','ion-android-remove','ion-android-remove-circle','ion-android-restaurant','ion-android-sad','ion-android-search','ion-android-send','ion-android-settings','ion-android-share','ion-android-share-alt','ion-android-star','ion-android-star-half','ion-android-star-outline','ion-android-stopwatch','ion-android-subway','ion-android-sunny','ion-android-sync','ion-android-textsms','ion-android-time','ion-android-train','ion-android-unlock','ion-android-upload','ion-android-volume-down','ion-android-volume-mute','ion-android-volume-off','ion-android-volume-up','ion-android-walk','ion-android-warning','ion-android-watch','ion-android-wifi','ion-aperture','ion-archive','ion-arrow-down-a','ion-arrow-down-b','ion-arrow-down-c','ion-arrow-expand','ion-arrow-graph-down-left','ion-arrow-graph-down-right','ion-arrow-graph-up-left','ion-arrow-graph-up-right','ion-arrow-left-a','ion-arrow-left-b','ion-arrow-left-c','ion-arrow-move','ion-arrow-resize','ion-arrow-return-left','ion-arrow-return-right','ion-arrow-right-a','ion-arrow-right-b','ion-arrow-right-c','ion-arrow-shrink','ion-arrow-swap','ion-arrow-up-a','ion-arrow-up-b','ion-arrow-up-c','ion-asterisk','ion-at','ion-backspace','ion-backspace-outline','ion-bag','ion-battery-charging','ion-battery-empty','ion-battery-full','ion-battery-half','ion-battery-low','ion-beaker','ion-beer','ion-bluetooth','ion-bonfire','ion-bookmark','ion-bowtie','ion-briefcase','ion-bug','ion-calculator','ion-calendar','ion-camera','ion-card','ion-cash','ion-chatbox','ion-chatbox-working','ion-chatboxes','ion-chatbubble','ion-chatbubble-working','ion-chatbubbles','ion-checkmark','ion-checkmark-circled','ion-checkmark-round','ion-chevron-down','ion-chevron-left','ion-chevron-right','ion-chevron-up','ion-clipboard','ion-clock','ion-close','ion-close-circled','ion-close-round','ion-closed-captioning','ion-cloud','ion-code','ion-code-download','ion-code-working','ion-coffee','ion-compass','ion-compose','ion-connection-bars','ion-contrast','ion-crop','ion-cube','ion-disc','ion-document','ion-document-text','ion-drag','ion-earth','ion-easel','ion-edit','ion-egg','ion-eject','ion-email','ion-email-unread','ion-erlenmeyer-flask','ion-erlenmeyer-flask-bubbles','ion-eye','ion-eye-disabled','ion-female','ion-filing','ion-film-marker','ion-fireball','ion-flag','ion-flame','ion-flash','ion-flash-off','ion-folder','ion-fork','ion-fork-repo','ion-forward','ion-funnel','ion-gear-a','ion-gear-b','ion-grid','ion-hammer','ion-happy','ion-happy-outline','ion-headphone','ion-heart','ion-heart-broken','ion-help','ion-help-buoy','ion-help-circled','ion-home','ion-icecream','ion-image','ion-images','ion-information','ion-information-circled','ion-ionic','ion-ios-alarm','ion-ios-alarm-outline','ion-ios-albums','ion-ios-albums-outline','ion-ios-americanfootball','ion-ios-americanfootball-outline','ion-ios-analytics','ion-ios-analytics-outline','ion-ios-arrow-back','ion-ios-arrow-down','ion-ios-arrow-forward','ion-ios-arrow-left','ion-ios-arrow-right','ion-ios-arrow-thin-down','ion-ios-arrow-thin-left','ion-ios-arrow-thin-right','ion-ios-arrow-thin-up','ion-ios-arrow-up','ion-ios-at','ion-ios-at-outline','ion-ios-barcode','ion-ios-barcode-outline','ion-ios-baseball','ion-ios-baseball-outline','ion-ios-basketball','ion-ios-basketball-outline','ion-ios-bell','ion-ios-bell-outline','ion-ios-body','ion-ios-body-outline','ion-ios-bolt','ion-ios-bolt-outline','ion-ios-book','ion-ios-book-outline','ion-ios-bookmarks','ion-ios-bookmarks-outline','ion-ios-box','ion-ios-box-outline','ion-ios-briefcase','ion-ios-briefcase-outline','ion-ios-browsers','ion-ios-browsers-outline','ion-ios-calculator','ion-ios-calculator-outline','ion-ios-calendar','ion-ios-calendar-outline','ion-ios-camera','ion-ios-camera-outline','ion-ios-cart','ion-ios-cart-outline','ion-ios-chatboxes','ion-ios-chatboxes-outline','ion-ios-chatbubble','ion-ios-chatbubble-outline','ion-ios-checkmark','ion-ios-checkmark-empty','ion-ios-checkmark-outline','ion-ios-circle-filled','ion-ios-circle-outline','ion-ios-clock','ion-ios-clock-outline','ion-ios-close','ion-ios-close-empty','ion-ios-close-outline','ion-ios-cloud','ion-ios-cloud-download','ion-ios-cloud-download-outline','ion-ios-cloud-outline','ion-ios-cloud-upload','ion-ios-cloud-upload-outline','ion-ios-cloudy','ion-ios-cloudy-night','ion-ios-cloudy-night-outline','ion-ios-cloudy-outline','ion-ios-cog','ion-ios-cog-outline','ion-ios-color-filter','ion-ios-color-filter-outline','ion-ios-color-wand','ion-ios-color-wand-outline','ion-ios-compose','ion-ios-compose-outline','ion-ios-contact','ion-ios-contact-outline','ion-ios-copy','ion-ios-copy-outline','ion-ios-crop','ion-ios-crop-strong','ion-ios-download','ion-ios-download-outline','ion-ios-drag','ion-ios-email','ion-ios-email-outline','ion-ios-eye','ion-ios-eye-outline','ion-ios-fastforward','ion-ios-fastforward-outline','ion-ios-filing','ion-ios-filing-outline','ion-ios-film','ion-ios-film-outline','ion-ios-flag','ion-ios-flag-outline','ion-ios-flame','ion-ios-flame-outline','ion-ios-flask','ion-ios-flask-outline','ion-ios-flower','ion-ios-flower-outline','ion-ios-folder','ion-ios-folder-outline','ion-ios-football','ion-ios-football-outline','ion-ios-game-controller-a','ion-ios-game-controller-a-outline','ion-ios-game-controller-b','ion-ios-game-controller-b-outline','ion-ios-gear','ion-ios-gear-outline','ion-ios-glasses','ion-ios-glasses-outline','ion-ios-grid-view','ion-ios-grid-view-outline','ion-ios-heart','ion-ios-heart-outline','ion-ios-help','ion-ios-help-empty','ion-ios-help-outline','ion-ios-home','ion-ios-home-outline','ion-ios-infinite','ion-ios-infinite-outline','ion-ios-information','ion-ios-information-empty','ion-ios-information-outline','ion-ios-ionic-outline','ion-ios-keypad','ion-ios-keypad-outline','ion-ios-lightbulb','ion-ios-lightbulb-outline','ion-ios-list','ion-ios-list-outline','ion-ios-location','ion-ios-location-outline','ion-ios-locked','ion-ios-locked-outline','ion-ios-loop','ion-ios-loop-strong','ion-ios-medical','ion-ios-medical-outline','ion-ios-medkit','ion-ios-medkit-outline','ion-ios-mic','ion-ios-mic-off','ion-ios-mic-outline','ion-ios-minus','ion-ios-minus-empty','ion-ios-minus-outline','ion-ios-monitor','ion-ios-monitor-outline','ion-ios-moon','ion-ios-moon-outline','ion-ios-more','ion-ios-more-outline','ion-ios-musical-note','ion-ios-musical-notes','ion-ios-navigate','ion-ios-navigate-outline','ion-ios-nutrition','ion-ios-nutrition-outline','ion-ios-paper','ion-ios-paper-outline','ion-ios-paperplane','ion-ios-paperplane-outline','ion-ios-partlysunny','ion-ios-partlysunny-outline','ion-ios-pause','ion-ios-pause-outline','ion-ios-paw','ion-ios-paw-outline','ion-ios-people','ion-ios-people-outline','ion-ios-person','ion-ios-person-outline','ion-ios-personadd','ion-ios-personadd-outline','ion-ios-photos','ion-ios-photos-outline','ion-ios-pie','ion-ios-pie-outline','ion-ios-pint','ion-ios-pint-outline','ion-ios-play','ion-ios-play-outline','ion-ios-plus','ion-ios-plus-empty','ion-ios-plus-outline','ion-ios-pricetag','ion-ios-pricetag-outline','ion-ios-pricetags','ion-ios-pricetags-outline','ion-ios-printer','ion-ios-printer-outline','ion-ios-pulse','ion-ios-pulse-strong','ion-ios-rainy','ion-ios-rainy-outline','ion-ios-recording','ion-ios-recording-outline','ion-ios-redo','ion-ios-redo-outline','ion-ios-refresh','ion-ios-refresh-empty','ion-ios-refresh-outline','ion-ios-reload','ion-ios-reverse-camera','ion-ios-reverse-camera-outline','ion-ios-rewind','ion-ios-rewind-outline','ion-ios-rose','ion-ios-rose-outline','ion-ios-search','ion-ios-search-strong','ion-ios-settings','ion-ios-settings-strong','ion-ios-shuffle','ion-ios-shuffle-strong','ion-ios-skipbackward','ion-ios-skipbackward-outline','ion-ios-skipforward','ion-ios-skipforward-outline','ion-ios-snowy','ion-ios-speedometer','ion-ios-speedometer-outline','ion-ios-star','ion-ios-star-half','ion-ios-star-outline','ion-ios-stopwatch','ion-ios-stopwatch-outline','ion-ios-sunny','ion-ios-sunny-outline','ion-ios-telephone','ion-ios-telephone-outline','ion-ios-tennisball','ion-ios-tennisball-outline','ion-ios-thunderstorm','ion-ios-thunderstorm-outline','ion-ios-time','ion-ios-time-outline','ion-ios-timer','ion-ios-timer-outline','ion-ios-toggle','ion-ios-toggle-outline','ion-ios-trash','ion-ios-trash-outline','ion-ios-undo','ion-ios-undo-outline','ion-ios-unlocked','ion-ios-unlocked-outline','ion-ios-upload','ion-ios-upload-outline','ion-ios-videocam','ion-ios-videocam-outline','ion-ios-volume-high','ion-ios-volume-low','ion-ios-wineglass','ion-ios-wineglass-outline','ion-ios-world','ion-ios-world-outline','ion-ipad','ion-iphone','ion-ipod','ion-jet','ion-key','ion-knife','ion-laptop','ion-leaf','ion-levels','ion-lightbulb','ion-link','ion-load-a','ion-load-b','ion-load-c','ion-load-d','ion-location','ion-lock-combination','ion-locked','ion-log-in','ion-log-out','ion-loop','ion-magnet','ion-male','ion-man','ion-map','ion-medkit','ion-merge','ion-mic-a','ion-mic-b','ion-mic-c','ion-minus','ion-minus-circled','ion-minus-round','ion-model-s','ion-monitor','ion-more','ion-mouse','ion-music-note','ion-navicon','ion-navicon-round','ion-navigate','ion-network','ion-no-smoking','ion-nuclear','ion-outlet','ion-paintbrush','ion-paintbucket','ion-paper-airplane','ion-paperclip','ion-pause','ion-person','ion-person-add','ion-person-stalker','ion-pie-graph','ion-pin','ion-pinpoint','ion-pizza','ion-plane','ion-planet','ion-play','ion-playstation','ion-plus','ion-plus-circled','ion-plus-round','ion-podium','ion-pound','ion-power','ion-pricetag','ion-pricetags','ion-printer','ion-pull-request','ion-qr-scanner','ion-quote','ion-radio-waves','ion-record','ion-refresh','ion-reply','ion-reply-all','ion-ribbon-a','ion-ribbon-b','ion-sad','ion-sad-outline','ion-scissors','ion-search','ion-settings','ion-share','ion-shuffle','ion-skip-backward','ion-skip-forward','ion-social-android','ion-social-android-outline','ion-social-angular','ion-social-angular-outline','ion-social-apple','ion-social-apple-outline','ion-social-bitcoin','ion-social-bitcoin-outline','ion-social-buffer','ion-social-buffer-outline','ion-social-chrome','ion-social-chrome-outline','ion-social-codepen','ion-social-codepen-outline','ion-social-css3','ion-social-css3-outline','ion-social-designernews','ion-social-designernews-outline','ion-social-dribbble','ion-social-dribbble-outline','ion-social-dropbox','ion-social-dropbox-outline','ion-social-euro','ion-social-euro-outline','ion-social-facebook','ion-social-facebook-outline','ion-social-foursquare','ion-social-foursquare-outline','ion-social-freebsd-devil','ion-social-github','ion-social-github-outline','ion-social-google','ion-social-google-outline','ion-social-googleplus','ion-social-googleplus-outline','ion-social-hackernews','ion-social-hackernews-outline','ion-social-html5','ion-social-html5-outline','ion-social-instagram','ion-social-instagram-outline','ion-social-javascript','ion-social-javascript-outline','ion-social-linkedin','ion-social-linkedin-outline','ion-social-markdown','ion-social-nodejs','ion-social-octocat','ion-social-pinterest','ion-social-pinterest-outline','ion-social-python','ion-social-reddit','ion-social-reddit-outline','ion-social-rss','ion-social-rss-outline','ion-social-sass','ion-social-skype','ion-social-skype-outline','ion-social-snapchat','ion-social-snapchat-outline','ion-social-tumblr','ion-social-tumblr-outline','ion-social-tux','ion-social-twitch','ion-social-twitch-outline','ion-social-twitter','ion-social-twitter-outline','ion-social-usd','ion-social-usd-outline','ion-social-vimeo','ion-social-vimeo-outline','ion-social-whatsapp','ion-social-whatsapp-outline','ion-social-windows','ion-social-windows-outline','ion-social-wordpress','ion-social-wordpress-outline','ion-social-yahoo','ion-social-yahoo-outline','ion-social-yen','ion-social-yen-outline','ion-social-youtube','ion-social-youtube-outline','ion-soup-can','ion-soup-can-outline','ion-speakerphone','ion-speedometer','ion-spoon','ion-star','ion-stats-bars','ion-steam','ion-stop','ion-thermometer','ion-thumbsdown','ion-thumbsup','ion-toggle','ion-toggle-filled','ion-transgender','ion-trash-a','ion-trash-b','ion-trophy','ion-tshirt','ion-tshirt-outline','ion-umbrella','ion-university','ion-unlocked','ion-upload','ion-usb','ion-videocamera','ion-volume-high','ion-volume-low','ion-volume-medium','ion-volume-mute','ion-wand','ion-waterdrop','ion-wifi','ion-wineglass','ion-woman','ion-wrench','ion-xbox');
			
				echo '<div id="'.$option['id'].'" class="sc-option clear">';
					echo '	<select name="icon-type" id="icon-type">
								<option value="fontawesome">Font Awesome</option>
								<option value="ionic">Ionicons</option>
							</select><br><br>';
					
					echo '<ul class="iconfonts fontawesome">';		
					foreach ($fonawesomeicons as $fi) {
						echo '<li><input type="radio" name="'.$option['id'].'" value="'.$fi.'"><i class="iconcheck fa '.$fi.'"></i></li>';
					}
					echo '</ul>';
					
					echo '<ul class="iconfonts ionic">';		
					foreach ($ionic as $io) {
						echo '<li><input type="radio" name="'.$option['id'].'" value="'.$io.'"><i class="iconcheck ion '.$io.'"></i></li>';
					}
					echo '</ul>';
				echo '</div>';
				
				
			break;
			
			}
			
        }
        
        ?>
    </div> <!-- END .sc_sc-option-->
	
</div>

</div>
</body>
</html>