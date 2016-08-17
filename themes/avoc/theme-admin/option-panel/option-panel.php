<?php


/*-----------------------------------------------------------------------------------

	Option Page

-----------------------------------------------------------------------------------*/

$sr_themename = "Avoc";
global $sr_prefix;

// Adding Option Panel
include("google-fonts.php");
global $sr_googlefonts;

// Including Theme Importer function
include("importer/theme-importer.php");


/*-----------------------------------------------------------------------------------*/
/*	Sections & Options
/*-----------------------------------------------------------------------------------*/
$sr_sections = array (
	
	array( "name" => __("General", 'sr_avoc_theme'),
		   "class" => "general",
		   "href" => "general"
		  ),
	
	array( "name" => __("Styling", 'sr_avoc_theme'),
		   "class" => "styling",
		   "href" => "styling"
		  ),
	
	array( "name" => __("Header / Menu", 'sr_avoc_theme'),
		   "class" => "header",
		   "href" => "header"
		  ),
		  
	array( "name" => __("Footer", 'sr_avoc_theme'),
		   "class" => "footer",
		   "href" => "footer"
		  ),
	
	array( "name" => __("Blog", 'sr_avoc_theme'),
		   "class" => "blog",
		   "href" => "blog"
		  ),
	
	array( "name" => __("Portfolio", 'sr_avoc_theme'),
		   "class" => "portfolio",
		   "href" => "portfolio"
		  ),
	
	array( "name" => __("Typography", 'sr_avoc_theme'),
		   "class" => "typography",
		   "href" => "typography"
		  ),
	
	array( "name" => __("Method", 'sr_avoc_theme'),
		   "class" => "method",
		   "href" => "method"
		  ),
		  
	array( "name" => __("Import Demo", 'sr_avoc_theme'),
		   "class" => "import",
		   "href" => "import"
		  )
	
);

$sr_options = array(
	
	array( "name" => __("General", 'sr_avoc_theme'),
		   "id" => "general",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
			
			array( "label" => __("Branding", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_general_branding",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => __("Logo Light", 'sr_avoc_theme'),
					   "desc" => __("Add your Logo in <strong>light color</strong>.  This logo will be shown if the background is dark.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_logolight",
					   "type" => "image"
					  ),  
	
				array( "label" => __("Logo Dark", 'sr_avoc_theme'),
					   "desc" => __("Add your Logo in <strong>dark color</strong>.  This logo will be shown if the background is light.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_logodark",
					   "type" => "image"
					  ),
				
				array( "label" => __("Favicon", 'sr_avoc_theme'),
					   "desc" => __("Add a 32px x 32px Png/Gif image that will represent your website's favicon.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_favicon",
					   "type" => "image"
					  ),
				
				array( "label" => __("Custom Login Logo", 'sr_avoc_theme'),
					   "desc" => __("Add a custom logo for the Wordpress login screen.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_loginlogo",
					   "type" => "image"
					  ),
				
			array( "label" => "Branding END",
				   "id" => $sr_prefix."_general_branding",
				   "type" => "groupend"
				  ),
				  
				  
			array( "label" => __("Preloader", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_general_preloader",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => __("Preloader", 'sr_avoc_theme'),
					   "desc" => __("Do you want the preloading effect on start of each page?", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_disablepreloader",
					   "type" => "checkbox",
					  ),
					  
				array( "label" => __("Show Header while loading", 'sr_avoc_theme'),
					   "desc" => __("Do you want to display the header (logo + menu) while the page is loading", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headerpreloader",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Yes", 'sr_avoc_theme'), 
									"value"=> "true"),		 
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value" => "false")
							),
					   "default" => "true"
					  ),
				  
			array( "label" => "Preloader END",
				   "id" => $sr_prefix."_general_preloader",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	
	array( "name" => __("Styling", 'sr_avoc_theme'),
		   "id" => "styling",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		
			array( "label" => __("Layout", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_styling_layout",
				   "type" => "groupstart"
				  ),
					  
				array( "label" => __("Custom Color", 'sr_avoc_theme'),
					   "desc" => __("This color will have impact on some elements (links, menu, etc.)", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_customcolor",
					   "type" => "color",
					   "default" => "#ea4452"
					  ),
					  
				array( "label" => __("Responsive Layout", 'sr_avoc_theme'),
					   "desc" => __("This activates the responsive layout for mobile devices.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_responsive",
					   "type" => "checkbox",
					  ),
							
			array( "label" => __("Layout", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_styling_layout",
				   "type" => "groupend"
				  ),
			
			array( "label" => __("Custom", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_styling_custom",
				   "type" => "groupstart"
				  ),
			
				array( "label" => __("Custom CSS", 'sr_avoc_theme'),
					   "desc" => __("Write your own CSS-Code.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_customcss",
					   "type" => "textarea"
					  ),
			
			array( "label" => __("Custom", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_styling_custom",
				   "type" => "groupend"
				  ),
			
				
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),

	
	
	array( "name" => __("Header", 'sr_avoc_theme'),
		   "id" => "header",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
		  	array( "label" => __("Header Settings (general)", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_headersettings",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => __("Logo / Menu position", 'sr_avoc_theme'),
					   "desc" => __("Choose a position for the header Logo and Menu", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headerlogomenu",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Default (Logo left / Menu right)", 'sr_avoc_theme'), 
									"value"=> "default"),		 
							array(	"name" => __("Opposite (Menu left / Logo right)", 'sr_avoc_theme'), 
									"value" => "opposite")
							),
					   "default" => "default"
					  ),
			
				array( "label" => __("Menu appearance", 'sr_avoc_theme'),
					   "desc" => __("How do you want to show your menu", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headermenuappearence",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => __("Hamburger Icon + 'Menu'", 'sr_avoc_theme'), 
									"value" => "default"),
							array(	"name" => __("Classic (Menu already open)", 'sr_avoc_theme'), 
									"value" => "classic")
							),
					   "default" => "default"
					  ),  
						  
				array( "label" => __("Transparent Header", 'sr_avoc_theme'),
					   "desc" => __("This option is for the open state of the menu, when the menu items are shown.", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headertransparent",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value"=> "false"),		 
							array(	"name" => __("Yes", 'sr_avoc_theme'), 
									"value" => "true")
							),
					   "default" => "false"
					  ),
					  
				array( "label" => __("Sticky Header", 'sr_avoc_theme'),
					   "desc" => __("Do you want the header to be sticky at the top?", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headersticky",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Yes", 'sr_avoc_theme'), 
									"value"=> "true"),		 
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value" => "false")
							),
					   "default" => "true"
					  ),
					  
				array( "label" => __("Enable Search", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sr_prefix."_disableheadersearch",
					   "type" => "checkbox",
					  ),
					  
				array( "label" => __("Search Option", 'sr_avoc_theme'),
					   "desc" => __("Enable/Disable your search for different areas", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headersearcharea",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("All (Portfolio,Posts & Pages)", 'sr_avoc_theme'), 
									"value"=> "post,page,portfolio"),		 
							array(	"name" => __("Portfolio only", 'sr_avoc_theme'), 
									"value" => "portfolio"),
							array(	"name" => __("Posts only", 'sr_avoc_theme'), 
									"value" => "post"),
							array(	"name" => __("Pages only", 'sr_avoc_theme'), 
									"value" => "page"),
							array(	"name" => __("Portfolio & Posts", 'sr_avoc_theme'), 
									"value" => "portfolio,post")	,
							array(	"name" => __("Portfolio & Pages", 'sr_avoc_theme'), 
									"value" => "portfolio,page")	,			
							array(	"name" => __("Posts & Pages", 'sr_avoc_theme'), 
									"value" => "post,page")	
							),
					   "default" => "true"
					  ),
					  
				array( "label" => __("Header height (padding)", 'sr_avoc_theme'),
					   "desc" => __("Change the padding of the header and adapt the height.", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_headerpadding",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Default", 'sr_avoc_theme'), 
									"value"=> "default"),		 
							array(	"name" => __("Medium", 'sr_avoc_theme'), 
									"value" => "medium"),
							array(	"name" => __("Small", 'sr_avoc_theme'), 
									"value" => "small")
							),
					   "default" => "default"
					  ), 
				
			array( "label" => "Header Settings END",
				   "id" => $sr_prefix."_headersettings",
				   "type" => "groupend"
				  ),
				  
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),
			
			
			
			
	array( "name" => __("Footer", 'sr_avoc_theme'),
		   "id" => "footer",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
		  	array( "label" => __("Footer Settings", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_footersettings",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => __("Back To Top", 'sr_avoc_theme'),
					   "desc" => __("Display the back to top button in footer", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_disablebacktotop",
					   "type" => "checkbox",
					  ),
					  
				array( "label" => __("Footer Color", 'sr_avoc_theme'),
					   "desc" => __("Light or Dark", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_footercolor",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Light", 'sr_avoc_theme'), 
									"value"=> "light"),		 
							array(	"name" => __("Dark", 'sr_avoc_theme'), 
									"value" => "dark")
							),
					   "default" => "light"
					  ),
					  
				array( "label" => __("Footer Layout", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sr_prefix."_footerlayout",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Center", 'sr_avoc_theme'), 
									"value"=> "center"),		 
							array(	"name" => __("Column (left/right)", 'sr_avoc_theme'), 
									"value" => "column")
							),
					   "default" => "center"
					  ),
					  
				array( "label" => __("Info Method", 'sr_avoc_theme'),
					   "desc" => __('The Footer works with widgets.  Go to the Appearance > Widgets and enter your wanted widgets for the footer area.', 'sr_avoc_theme'),
					   "id" => $sr_prefix."_info",
					   "type" => "info"
					  ),
				
			array( "label" => "Footer Settings END",
				   "id" => $sr_prefix."_footersettings",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),		

	
	
	
	array( "name" => __("Blog", 'sr_avoc_theme'),
		   "id" => "blog",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),	 
			
			array( "label" => __("Blog Page", 'sr_avoc_theme'),
				   "desc" => __("Select a page which takes all the styling (header,page-title,...) for the home page. <br><br> This page is in fact just a 'virtual' page which only purpose is to add styles to the home page.", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_blogpage",
				   "type" => "pagelist",
				   "condition" => "frontpage"
				  ),
	
			array( "label" => __("Entries", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_blogentriesgroup",
				   "type" => "groupstart"
				  ),
								
				array( "label" => __("Read More Button", 'sr_avoc_theme'),
					   "desc" => __("Enable or disable the read more button on blog entries.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_blogentriesreadmore",
					   "type" => "checkbox"
					  ),
					  
				array( "label" => __("Blog Style", 'sr_avoc_theme'),
					   "desc" => __("What style do you want for your blog page.", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_blogentriesstyle",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => __("Masonry", 'sr_avoc_theme'), 
									"value"=> "masonry")
							),
					   "default" => "masonry"
					  ),
					  
					array( 	"label" => "Masonry",
							"id" => $sr_prefix."_blogentriesstyle",
							"hiding" => "masonry",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => __("Grid Size", 'sr_avoc_theme'),
							   "desc" => __("Select a grid size for the blog preview.", 'sr_avoc_theme').'',
							   "id" => $sr_prefix."_blogentriessize",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => __("Default", 'sr_avoc_theme'), 
											"value"=> "600"),
									array(	"name" => __("Small", 'sr_avoc_theme'), 
											"value"=> "420")
									),
							   "default" => "600"
							  ),	
						
						array( "label" => __("Excerpt preview", 'sr_avoc_theme'),
							   "desc" => __("Do you want to show the excerpt preview? (first 30 words)", 'sr_avoc_theme').'',
							   "id" => $sr_prefix."_blogentriesexcerpt",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value"=> "true"),		 
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value" => "false")
									),
							   "default" => "true"
							  ),	
							  
								  
						array( "label" => __("Fullwidth", 'sr_avoc_theme'),
							   "desc" => "",
							   "id" => $sr_prefix."_blogentriesfullwidth",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value"=> "false"),		 
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value" => "true")
									),
							   "default" => "false"
							  ),		
							  
					array( 	"label" => "Masonry",
							"id" => $sr_prefix."_blogentriesstyle",
							"hiding" => "masonry",	
							"type" => "hidinggroupend"
						),
						
					array( "label" => __("Sidebar", 'sr_avoc_theme'),
					   "desc" => __("Do you want enable the sidebar for the blog page?  If yes, add your widgets to the sidebar.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_blogsidebar",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value"=> "false"),		 
							array(	"name" => __("Yes", 'sr_avoc_theme'), 
									"value" => "true")
							),
					   "default" => "false"
					  ),	
					  
					array( 	"label" => "Sidebar Yes",
							"id" => $sr_prefix."_blogsidebar",
							"hiding" => "true",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => __("Sidebar Position", 'sr_avoc_theme'),
							   "desc" => "",
							   "id" => $sr_prefix."_blogsidebarposition",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => __("Right", 'sr_avoc_theme'), 
											"value"=> "right-float"),		 
									array(	"name" => __("Left", 'sr_avoc_theme'), 
											"value" => "left-float")
									),
							   "default" => "right-float"
							  ),
							  
						array( "label" => __("Sidebar Style", 'sr_avoc_theme'),
							   "desc" => "",
							   "id" => $sr_prefix."_blogsidebarstyle",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => __("None", 'sr_avoc_theme'), 
											"value"=> " "),		 
									array(	"name" => __("Separator border", 'sr_avoc_theme'), 
											"value" => "sidebar-separator"),
									array(	"name" => __("Full border", 'sr_avoc_theme'), 
											"value" => "sidebar-fullborder"),
									array(	"name" => __("Light Background", 'sr_avoc_theme'), 
											"value" => "sidebar-light"),
									array(	"name" => __("Dark background", 'sr_avoc_theme'), 
											"value" => "sidebar-dark")
									),
							   "default" => " "
							  ),
							  
						array( "label" => __("Single Blog Sidebar", 'sr_avoc_theme'),
							   "desc" => __("So you want to enable the sidebar also for the single post pages?", 'sr_avoc_theme'),
							   "id" => $sr_prefix."_blogsidebarsingle",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value"=> "false"),		 
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value" => "true")
									),
							   "default" => "right"
							  ),
						
					array( 	"label" => "Sidebar Yes",
							"id" => $sr_prefix."_blogsidebar",
							"hiding" => "true",	
							"type" => "hidinggroupend"
						),	
																
			array( "label" => "Entries END",
				   "id" => $sr_prefix."_blogentriesgroup",
				   "type" => "groupend"
				  ),
			
			array( "label" => __("Single Post View", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_blogpostsgroup",
				   "type" => "groupstart"
				  ),
				  
				
				array( "label" => __("Show Meta datas", 'sr_avoc_theme'),
					   "desc" => __("Do you want to show the meta datas of the blog posts (Author,Categories,...)", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_blogpostmeta",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => __("Yes", 'sr_avoc_theme'), 
									"value"=> "true"),
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value"=> "false")
							),
					   "default" => "true"
					  ),
					  
					array( 	"label" => "Meta Yes",
							"id" => $sr_prefix."_blogpostmeta",
							"hiding" => "true",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => __("Author Avatar", 'sr_avoc_theme'),
						   "desc" => __("Shows the author avatar", 'sr_avoc_theme'),
						   "id" => $sr_prefix."_blogpostsdisableavatar",
						   "type" => "checkbox"
						  ),
						  
						array( "label" => __("Author Name", 'sr_avoc_theme'),
						   "desc" => __("Show the name of the auhor (written by ...)", 'sr_avoc_theme'),
						   "id" => $sr_prefix."_blogpostsdisableauthor",
						   "type" => "checkbox"
						  ),
						
						array( "label" => __("Categories", 'sr_avoc_theme'),
						   "desc" => __("Shows the related categories in the meta area", 'sr_avoc_theme'),
						   "id" => $sr_prefix."_blogpostsdisablecategory",
						   "type" => "checkbox"
						  ),
						  
						array( "label" => __("Tags", 'sr_avoc_theme'),
						   "desc" => __("Shows the related tags in the meta area", 'sr_avoc_theme'),
						   "id" => $sr_prefix."_blogpostsdisabletags",
						   "type" => "checkbox"
						  ),
						
					array( 	"label" => "Meta Yes",
							"id" => $sr_prefix."_blogpostmeta",
							"hiding" => "true",	
							"type" => "hidinggroupend"
						),  
			
					  
				array( "label" => __("Single Pagination", 'sr_avoc_theme'),
					   "desc" => __("Do you want to activate the pagination between posts", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_blogpostpagination",
					   "type" => "checkbox"
					  ),
					  
				array( "label" => __("Back to Blog", 'sr_avoc_theme'),
					   "desc" => __("Do you want to show the back to blog link?", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_blogbacklink",
					   "type" => "checkbox"
					  ),
					  					  
				array( "label" => __("Blog Posts Comments", 'sr_avoc_theme'),
				   	   "desc" => "Disable/Enable Comments On Blog Posts",
					   "id" => $sr_prefix."_blogcomments",
					   "type" => "checkbox"
					  ),
					  
				array( "label" => __("Share", 'sr_avoc_theme'),
					   "desc" => __("Enable the share feature.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_blogpostshare",
					   "type" => "checkbox"
					  ),
				  														
			array( "label" => "Posts END",
				   "id" => $sr_prefix."_blogpostsgroup",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	array( "name" => __("Portfolio", 'sr_avoc_theme'),
		   "id" => "portfolio",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
	
			array( "label" => __("Portfolio Preview (Grid)", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_portfolio-grid",
				   "type" => "groupstart"
				  ),
				  					  
				array( "label" => __("Count (items per page)", 'sr_avoc_theme'),
					   "desc" => __("How many Portfolio items do you want to show. <br>Enter <b>-1</b> to show all your portfolio items.<br>If you have more portfolio items a pagination will be shown.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfoliocount",
					   "type" => "text",
					   "default" => -1,
					  ),	
					  
				array(	'label' => __("Grid Size", 'sr_avoc_theme'),  
						'desc'  => "",  
						'id'    => $sr_prefix.'_portfoliogridsize',  
						'type'  => 'selectbox', 
						'option' => array( 
							array(	"name" => __("Default", 'sr_avoc_theme'), 
									"value" => "wrapper"),
							array(	"name" => __("Fullwidth (100% of window width)", 'sr_avoc_theme'), 
									"value" => "wrapper-full"),
							)
					),
					  
				array( 'label' => __("Grid Type", 'sr_avoc_theme'),  
	    			   'desc'  => __("Wolf Grid or Masonry Grid?", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfoliotype",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => __("Wolf Grid", 'sr_avoc_theme'), 
									"value" => "wolf"),
							array(	"name" => __("Masonry Grid", 'sr_avoc_theme'), 
									"value" => "masonry"), 
							array(	"name" => __("Classic Grid", 'sr_avoc_theme'), 
									"value" => "classic")
							),
					   "default" => "wolf"
					  ),
					  
					array( 	"label" => "Wolf",
							"id" => $sr_prefix."_portfoliotype",
							"hiding" => "wolf",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => __("Scroll Parallax", 'sr_avoc_theme'),
							   "desc" => __("Default parallax effect on scroll.", 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliowolfparallax",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value" => "true"),
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value"=> "false")
									)
							  ),
							  
						array( "label" => __("Caption Parallax", 'sr_avoc_theme'),
							   "desc" => __("Do you want the captions (text) to have an individual parallax speed?", 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliowolfcaptionparallax",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value" => "true"),
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value"=> "false")
									)
							  ),
							  
						array( "label" => __("Random Horizontal Offset", 'sr_avoc_theme'),
							   "desc" => __('This will add a horizontal offset to each item which leads to a "off-grid" layout.', 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliowolfoffset",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value" => "false"),
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value"=> "yes")
									)
							  ),
							  
						array( "label" => __("Mouse Parallax", 'sr_avoc_theme'),
							   "desc" => __('Additional parallax effect on mouse move.', 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliowolfmouseparallax",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value" => "false"),
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value"=> "yes")
									)
							  ),
							  
						array( "label" => __("Caption position", 'sr_avoc_theme'),
							   "desc" => __('Static will place the caption content below the image.', 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliowolfcaption",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Overlay (left/right)", 'sr_avoc_theme'), 
											"value" => "overlay"),
									array(	"name" => __("Static", 'sr_avoc_theme'), 
											"value"=> "static")
									)
							  ),
							  
						array(	"label" => __("Caption Size", 'sr_avoc_theme'),
								"desc" => __("General Size of your caption.", 'sr_avoc_theme'),
								'id'    => $sr_prefix.'_portfoliowolfcaptionsize',  
								'type'  => 'selectbox', 
								'option' => array( 
									array(	"name" => "H1", 
											"value" => "h1"),
									array(	"name" => "H2", 
											"value" => "h2"),
									array(	"name" => "H3", 
											"value" => "h3"),
									array(	"name" => "H4", 
											"value" => "h4"),
									array(	"name" => "H5", 
											"value" => "h5"),
									array(	"name" => "H6", 
											"value" => "h6")
									), 
								'default'  => 'h4' 
							),
							  
						array( "label" => __("Hover Effect", 'sr_avoc_theme'),
							   "desc" => __('What hover effect would you like for the wolf grid elements?', 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliowolfhover",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Default (image zoom + caption move)", 'sr_avoc_theme'), 
											"value" => "default"),
									array(	"name" => __("Image hover to light", 'sr_avoc_theme'), 
											"value"=> "light"),
									array(	"name" => __("Image hover to dark", 'sr_avoc_theme'), 
											"value"=> "dark")
									)
							  ),
						
					array( 	"label" => "Wolf",
							"id" => $sr_prefix."_portfoliotype",
							"hiding" => "wolf",	
							"type" => "hidinggroupend"
						),
						
					array( 	"label" => "Masonry",
							"id" => $sr_prefix."_portfoliotype",
							"hiding" => "masonry classic",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => __("Thumbnail Size", 'sr_avoc_theme'),
							   "desc" => __("How big do you want the thumbnails?", 'sr_avoc_theme').'',
							   "id" => $sr_prefix."_portfoliothumbsize",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Small", 'sr_avoc_theme'), 
											"value" => "300"),
									array(	"name" => __("Medium", 'sr_avoc_theme'), 
											"value"=> "420"),
									array(	"name" => __("Big", 'sr_avoc_theme'), 
											"value"=> "600"),
									array(	"name" => __("Huge", 'sr_avoc_theme'), 
											"value"=> "800")
									),
								'default'  => '420' 
							  ),
					  
						array( "label" => __("Spacing", 'sr_avoc_theme'),
							   "desc" => __("Spacing between the thumbnail.", 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliospacing",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Yes", 'sr_avoc_theme'), 
											"value" => "true"),
									array(	"name" => __("No", 'sr_avoc_theme'), 
											"value"=> "false")
									)
							  ),
									
						array( "label" => __("Hover Effect", 'sr_avoc_theme'),
							   "desc" => __('What hover effect would you like for the grid elements?', 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliohover",
							   "type" => "selectbox",
							   "option" => array(	 
									array(	"name" => __("Light", 'sr_avoc_theme'), 
											"value"=> "light"),
									array(	"name" => __("Dark", 'sr_avoc_theme'), 
											"value"=> "dark")
									)
							  ),
						
					array( 	"label" => "Masonry",
							"id" => $sr_prefix."_portfoliotype",
							"hiding" => "masonry",	
							"type" => "hidinggroupend"
						),
						
				array( "label" => __("Show Category", 'sr_avoc_theme'),
					   "desc" => __("Do you want to display the categories for the thumbnails?", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfoliogridcategory",
					   "type" => "checkbox"
					  ),
					  				
			array( "label" => "Portfolio Grid",
				   "id" => $sr_prefix."_portfolio-grid",
				   "type" => "groupend"
				  ),
				  
			array( "label" => __("Portfolio Single View", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_portfolio-single",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => __("Custom URL name", 'sr_avoc_theme'),
					   "desc" => __("This is the name/word which will appear in your url (if your permalink settings are set to post name)<br><br><strong>ATTENTION</strong>: if this doesn't apply you prbabbly need to delete & reinstall the avoc portfolio plugin.  Also, resave your permalinks in Settings > Permalinks.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfoliourl",
					   "type" => "text",
					   "default" => "portfolio",
					  ),		  
					  					  
				array( "label" => __("Share", 'sr_avoc_theme'),
					   "desc" => __("Enable the share feature.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfolioshare",
					   "type" => "checkbox"
					  ),
					  
				array( "label" => __("Single Pagination", 'sr_avoc_theme'),
					   "desc" => __("Enable the pagination between the portfolio posts.", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfoliopagination",
					   "type" => "checkbox"
					  ),
					  
				array( "label" => __("Pagination Image", 'sr_avoc_theme'),
					   "desc" => __("Do you want to show the featured image or not?", 'sr_avoc_theme'),
					   "id" => $sr_prefix."_portfoliopaginationimage",
					   "type" => "checkbox"
					  ),
				
				array( "label" => __("Back to Works button", 'sr_avoc_theme'),
					   "desc" => __("Do you want to show the back to works button when bein in single portfolio view.", 'sr_avoc_theme').'',
					   "id" => $sr_prefix."_portfoliobacklink",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => __("Yes", 'sr_avoc_theme'), 
									"value"=> "true"),		 
							array(	"name" => __("No", 'sr_avoc_theme'), 
									"value" => "false")
							),
					   "default" => "true"
					  ),
					  
					array( 	"label" => "Back to Works button",
							"id" => $sr_prefix."_portfoliobacklink",
							"hiding" => "true",	
							"type" => "hidinggroupstart"
						),
					  
						array( "label" => __("Portfolio page", 'sr_avoc_theme'),
							   "desc" => __("Select your Portfolio page where the button should lead to.", 'sr_avoc_theme'),
							   "id" => $sr_prefix."_portfoliopage",
							   "type" => "pagelist"
							  ),
						  
					array( 	"label" => "Back to Works button",
							"id" => $sr_prefix."_portfoliobacklink",
							"type" => "hidinggroupend"
						),	
						
			array( "label" => __("Portfolio Comments", 'sr_avoc_theme'),
				   	   "desc" => "Disable/Enable Comments for Portfolio items",
					   "id" => $sr_prefix."_portfoliocomments",
					   "type" => "checkbox",
					   "default" => 'false'
					  ),
					  
					  				
			array( "label" => "Portfolio Single View",
				   "id" => $sr_prefix."_portfolio-single",
				   "type" => "groupend"
				  ),
				
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	array( "name" => __("Typography", 'sr_avoc_theme'),
		   "id" => "typography",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
	
			array( "label" => __("Body", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_typography-body",
				   "type" => "groupstart"
				  ),
							
				array( "label" => __("Body Font", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sr_prefix."_bodyfont",
					   "type" => "typo-body",
					   "option" => array( 
							array(	"id" => $sr_prefix."_bodyfont-font" ),
							array(	"id" => $sr_prefix."_bodyfont-weight" ),
							array(	"id" => $sr_prefix."_bodyfont-boldweight" ),
							array(	"id" => $sr_prefix."_bodyfont-size" ),
							array(	"id" => $sr_prefix."_bodyfont-height" ),
							array(	"id" => $sr_prefix."_bodyfont-spacing" ),
							array(	"id" => $sr_prefix."_bodyfont-1024" ),
							array(	"id" => $sr_prefix."_bodyfont-780" ),
							array(	"id" => $sr_prefix."_bodyfont-480" )
							),
					   "default" => array('Lato','300','700','16px','26px','0.02','16px','16px','15px')
					  ),
			
			array( "label" => "Body",
				   "id" => $sr_prefix."_typography-body",
				   "type" => "groupend"
				  ),
			
			array( "label" => __("General Headings", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_typography-headings",
				   "type" => "groupstart"
				  ),
				
				array( "label" => "H1",
				   	   "desc" => "",
					   "id" => $sr_prefix."_h1font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => $sr_prefix."_h1font-font" ),
							array(	"id" => $sr_prefix."_h1font-weight" ),
							array(	"id" => $sr_prefix."_h1font-boldweight" ),
							array(	"id" => $sr_prefix."_h1font-size" ),
							array(	"id" => $sr_prefix."_h1font-spacing" ),
							array(	"id" => $sr_prefix."_h1font-transform" ),
							array(	"id" => $sr_prefix."_h1font-1024" ),
							array(	"id" => $sr_prefix."_h1font-780" ),
							array(	"id" => $sr_prefix."_h1font-480" )
							),
					   "default" => array('Montserrat','400','700','84px','0.08','uppercase','74px','60px','42px')
					  ),
				
				array( "label" => "H2",
				   	   "desc" => "",
					   "id" => $sr_prefix."_h2font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => $sr_prefix."_h2font-font" ),
							array(	"id" => $sr_prefix."_h2font-weight" ),
							array(	"id" => $sr_prefix."_h2font-boldweight" ),
							array(	"id" => $sr_prefix."_h2font-size" ),
							array(	"id" => $sr_prefix."_h2font-spacing" ),
							array(	"id" => $sr_prefix."_h2font-transform" ),
							array(	"id" => $sr_prefix."_h2font-1024" ),
							array(	"id" => $sr_prefix."_h2font-780" ),
							array(	"id" => $sr_prefix."_h2font-480" )
							),
					   "default" => array('Montserrat','400','700','56px','0.08','uppercase','48px','38px','32px')
					  ),
				
				array( "label" => "H3",
				   	   "desc" => "",
					   "id" => $sr_prefix."_h3font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => $sr_prefix."_h3font-font" ),
							array(	"id" => $sr_prefix."_h3font-weight" ),
							array(	"id" => $sr_prefix."_h3font-boldweight" ),
							array(	"id" => $sr_prefix."_h3font-size" ),
							array(	"id" => $sr_prefix."_h3font-spacing" ),
							array(	"id" => $sr_prefix."_h3font-transform" ),
							array(	"id" => $sr_prefix."_h3font-1024" ),
							array(	"id" => $sr_prefix."_h3font-780" ),
							array(	"id" => $sr_prefix."_h3font-480" )
							),
					   "default" => array('Montserrat','400','700','34px','0.08','uppercase','30px','28px','26px')
					  ),
				
				array( "label" => "H4",
				   	   "desc" => "",
					   "id" => $sr_prefix."_h4font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => $sr_prefix."_h4font-font" ),
							array(	"id" => $sr_prefix."_h4font-weight" ),
							array(	"id" => $sr_prefix."_h4font-boldweight" ),
							array(	"id" => $sr_prefix."_h4font-size" ),
							array(	"id" => $sr_prefix."_h4font-spacing" ),
							array(	"id" => $sr_prefix."_h4font-transform" ),
							array(	"id" => $sr_prefix."_h4font-1024" ),
							array(	"id" => $sr_prefix."_h4font-780" ),
							array(	"id" => $sr_prefix."_h4font-480" )
							),
					   "default" => array('Montserrat','400','700','27px','0.08','uppercase','24px','22px','21px')
					  ),
				
				array( "label" => "H5",
				   	   "desc" => "",
					   "id" => $sr_prefix."_h5font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => $sr_prefix."_h5font-font" ),
							array(	"id" => $sr_prefix."_h5font-weight" ),
							array(	"id" => $sr_prefix."_h5font-boldweight" ),
							array(	"id" => $sr_prefix."_h5font-size" ),
							array(	"id" => $sr_prefix."_h5font-spacing" ),
							array(	"id" => $sr_prefix."_h5font-transform" ),
							array(	"id" => $sr_prefix."_h5font-1024" ),
							array(	"id" => $sr_prefix."_h5font-780" ),
							array(	"id" => $sr_prefix."_h5font-480" )
							),
					   "default" => array('Montserrat','400','700','20px','0.08','uppercase','19px','18px','18px')
					  ),
				
				array( "label" => "H6",
				   	   "desc" => "",
					   "id" => $sr_prefix."_h6font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => $sr_prefix."_h6font-font" ),
							array(	"id" => $sr_prefix."_h6font-weight" ),
							array(	"id" => $sr_prefix."_h6font-boldweight" ),
							array(	"id" => $sr_prefix."_h6font-size" ),
							array(	"id" => $sr_prefix."_h6font-spacing" ),
							array(	"id" => $sr_prefix."_h6font-transform" ),
							array(	"id" => $sr_prefix."_h6font-1024" ),
							array(	"id" => $sr_prefix."_h6font-780" ),
							array(	"id" => $sr_prefix."_h6font-480" )
							),
					   "default" => array('Montserrat','400','700','16px','0.08','uppercase','16px','16px','16px')
					  ),
				
			array( "label" => "Headings",
				   "id" => $sr_prefix."_typography-headings",
				   "type" => "groupend"
				  ),
				  
				  
			array( "label" => __("Misc Headings", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_typography-sectiontitle",
				   "type" => "groupstart"
				  ),
							
				array( "label" => __("Subtitle", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sr_prefix."_subtitle",
					   "type" => "typo-sub",
					   "option" => array( 
							array(	"id" => $sr_prefix."_subtitle-font" ),
							array(	"id" => $sr_prefix."_subtitle-weight" ),
							array(	"id" => $sr_prefix."_subtitle-boldweight" ),
							array(	"id" => $sr_prefix."_subtitle-spacing" ),
							array(	"id" => $sr_prefix."_subtitle-transform" ),
							),
					   "default" => array('Josefin Sans','400','700','0.04','none')
					  ),
					  			
			array( "label" => "sectiontitle",
				   "id" => $sr_prefix."_typography-sectiontitle",
				   "type" => "groupend"
				  ),
			
						
			array( "label" => __("Navigation", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_typography-navigation",
				   "type" => "groupstart"
				  ),
				
				array( "label" => __("Root Menu", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sr_prefix."_navigationfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => $sr_prefix."_navigationfont-font" ),
							array(	"id" => $sr_prefix."_navigationfont-weight" ),
							array(	"id" => $sr_prefix."_navigationfont-size" ),
							array(	"id" => $sr_prefix."_navigationfont-spacing" ),
							array(	"id" => $sr_prefix."_navigationfont-transform" )
							),
					   "default" => array('Maven Pro','700','14px','0.12','uppercase')
					  ),
					  
				array( "label" => __("Sub Menu", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sr_prefix."_navigationsubfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => $sr_prefix."_navigationsubfont-font" ),
							array(	"id" => $sr_prefix."_navigationsubfont-weight" ),
							array(	"id" => $sr_prefix."_navigationsubfont-size" ),
							array(	"id" => $sr_prefix."_navigationsubfont-spacing" ),
							array(	"id" => $sr_prefix."_navigationsubfont-transform" )
							),
					   "default" => array('Maven Pro','400','13px','0.1','uppercase')
					  ),
											
			array( "label" => "Navigation",
				   "id" => $sr_prefix."_typography-navigation",
				   "type" => "groupend"
				  ),
			
			array( "label" => __("Buttons", 'sr_avoc_theme'),
				   "id" => $sr_prefix."_typography-button",
				   "type" => "groupstart"
				  ),
				
				array( "label" => __("Button Font", 'sr_avoc_theme'),
				   	   "desc" => "",
					   "id" => $sr_prefix."_buttonfont",
					   "type" => "typo-button",
					   "option" => array( 
							array(	"id" => $sr_prefix."_buttonfont-font" ),
							array(	"id" => $sr_prefix."_buttonfont-weight" ),
							array(	"id" => $sr_prefix."_buttonfont-boldweight" ),
							array(	"id" => $sr_prefix."_buttonfont-spacing" ),
							array(	"id" => $sr_prefix."_buttonfont-transform" )
							),
					   "default" => array('Montserrat','400','700','0.1','uppercase')
					  ),
				
			array( "label" => "Buttons",
				   "id" => $sr_prefix."_typography-button",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
				
	
	array( "name" => __("Method", 'sr_avoc_theme'),
		   "id" => "method",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
				array( "label" => __("Method of options", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => $sr_prefix."_method",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => __("Custom File", 'sr_avoc_theme'), 
									"value"=> "custom-file"),		 
							array(	"name" => __("HTML", 'sr_avoc_theme'), 
									"value" => "html")
							),
					   "default" => "custom-file"
					  ),	
					  
				array( "label" => __("Info Method", 'sr_avoc_theme'),
					   "desc" => __('The <b>Custom File method</b> is the best.  The css rules are written in a css file (custom-style.php) outside of the html. This method might not work on some servers.<br><br>The <b>HTML method</b> is fail-safe. The css rules are written in the head of the html.  <br>Only use this if "Custom File" is not working.<br><br><b>How to check if "custom file method" is working?</b><br>Choose "custom file" and change the "Main Color" in Styling and check if the color changed in your frontend site.  If this is the case, the custom file method is working fine.', 'sr_avoc_theme'),
					   "id" => $sr_prefix."_info",
					   "type" => "info"
					  ),  
			
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
			
			
	array( "name" => __("Import Demo", 'sr_avoc_theme'),
		   "id" => "import",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
				array( "label" => __("Demo Choose", 'sr_avoc_theme'),
					   "desc" => "",
					   "id" => "",
					   "type" => "import"
					  ),				 
			
	array ( "type" => "sectionend",
		   	"id" => "sectionend")
			
		
);




/*-----------------------------------------------------------------------------------*/
/*	Add Page/Subpage & generate save/reset
/*-----------------------------------------------------------------------------------*/

function sr_theme_add_admin() {
 
global $sr_themename, $sr_prefix, $sr_options;
 
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	if ( isset($_REQUEST['action'])  &&  $_REQUEST['action'] == 'save' ) {
		$optiontree = '';		
		foreach ($sr_options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { 
				update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				$o_val = str_replace(home_url(),'SR_SITE_URL',$_REQUEST[$value['id']]);;
				$optiontree .= $value['id'].';:;'.$o_val.'|:|'; 
			} 
			else { delete_option( $value['id'] ); }
			
			if( isset(  $value['option'] ) && $value['option'] ) {
				foreach ($value['option'] as $var) {
					if ( isset(  $var['id']) ) {
						if ( isset( $_REQUEST[ $var['id'] ] ) ) { 
							update_option( $var['id'], $_REQUEST[ $var['id'] ]  );
							$o_val = str_replace(home_url(),'SR_SITE_URL',$_REQUEST[$var['id']]);;
							$optiontree .= $var['id'].';:;'.$o_val.'|:|'; 
						} 
						else { delete_option( $var['id'] ); }
					}
				}
			}
			
		}
		$optiontree = substr($optiontree, 0, -3);
		update_option( $sr_prefix.'_optiontree', $optiontree );
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&saved=true' ) );
		die;
	} 
	else if( isset($_REQUEST['action'])  &&  $_REQUEST['action'] == 'reset' ) {
		foreach ($sr_options as $value) {
			delete_option( $value['id'] ); 
			
			foreach ($value['option'] as $var) {
				delete_option( $var['id'] ); 
			}
		}
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&reset=true' ) );
		die;
	}
	else if( isset($_REQUEST['importoptions'])  &&  $_REQUEST['importoptions'] !== '' ) {
		sr_theme_importoptions($_REQUEST['importoptions']);
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=true' ) );
		die;
	}
}
 
add_theme_page($sr_themename, 'Theme Options', 'administrator', basename(__FILE__), 'sr_theme_interface');
}

add_action('admin_menu', 'sr_theme_add_admin');



/*-----------------------------------------------------------------------------------*/
/*	Building interface
/*-----------------------------------------------------------------------------------*/
function sr_theme_interface() {
 
global $sr_themename, $sr_prefix, $sr_options, $sr_sections, $sr_googlefonts;
$i=0;
 
echo '	<div class="sr_wrap">
		<form method="post">
		
		<div class="sr_header clear">
			<h1>'.$sr_themename.'</h1> <div class="icon32" id="icon-options-general"></div>
			<input name="save" type="submit" value="Save all changes" class="submit-option"/>
		</div>
		';
    
	if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] != "") { echo '<div class="message_ok fade"><p><strong>'.$sr_themename.' '.__("settings saved", 'sr_avoc_theme').'.</strong></p></div>'; }
	if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] != "") { echo '<div class="message_ok fade"><p><strong>'.$sr_themename.' '.__("settings reset", 'sr_avoc_theme').'.</strong></p></div>'; }
	
	if ( isset($_REQUEST['blogreset']) && $_REQUEST['blogreset'] != "") {
		echo '<div class="message_ok fade"><p><strong>"'.$_REQUEST['blogreset'].'" '.__("for blog settings reset", 'sr_avoc_theme').'.</strong></p></div>';
		if ($_REQUEST['blogreset'] == 'views') { sr_resetPostMeta('views','post'); }
		if ($_REQUEST['blogreset'] == 'likes') { sr_resetPostMeta('likes','post'); }
	}
	
	if ( isset($_REQUEST['portfolioreset']) && $_REQUEST['portfolioreset'] != "") {
		echo '<div class="message_ok fade"><p><strong>"'.$_REQUEST['portfolioreset'].'" '.__("for portfolio settings reset", 'sr_avoc_theme').'.</strong></p></div>';
		if ($_REQUEST['portfolioreset'] == 'views') { sr_resetPostMeta('views','portfolio'); }
		if ($_REQUEST['portfolioreset'] == 'likes') { sr_resetPostMeta('likes','portfolio'); }
	}
	
	if ( isset($_REQUEST['import']) && $_REQUEST['import'] !== "") {
		echo '<div class="message_ok fade message_import"><p><strong>'.__("The Demo has been imported", 'sr_avoc_theme').'.</strong></p></div>';
		sr_theme_import_updatepagebuilder();
	}
	
	
	echo '<div id="sr_body" class="clear">';
    
	//  Add the sections
	echo '<ul id="section-list">';
	foreach ($sr_sections as $section) {
	
		echo '<li class="'.$section['class'].'"><a href="'.$section['href'].'">'.$section['name'].'</a></li>';
	
	} 
	echo '</ul>';
	
	
	echo '<div class="section">';
	
	$sr_fontsize = array('9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','29px','30px','31px','32px','33px','34px','35px','36px','37px','38px','39px','40px','41px','42px','43px','44px','45px','46px','47px','48px','49px','50px','51px','52px','53px','54px','55px','56px','57px','58px','59px','60px','61px','62px','63px','64px','65px','66px','67px','68px','69px','70px','71px','72px','73px','74px','75px','76px','77px','78px','79px','80px','81px','82px','83px','84px','85px','86px','87px','88px','89px','90px','91px','92px','93px','94px','95px','96px','97px','98px','99px','100px');
	
	$sr_fontspacing = array('-0.2','-0.15','-0.12','-0.1','-0.08','-0.04','-0.02','0','0.02','0.04','0.08','0.1','0.12','0.15','0.2','0.25','0.3','0.35','0.4',);
	
	//  Add the options
	foreach ($sr_options as $option) {
		
		$value = stripslashes(get_option( $option['id'])  );
		if ($value == '' && (isset($option['default']) && $option['default'] !== '')) { $value = $option['default']; }
		
		$showField = false;
		if (isset($option['condition']))  {
				if ($option['condition'] == "frontpage") {
					if ( 'posts' == get_option('show_on_front') ) { $showField = true; }	
				}
		} else {
		$showField = true;
		}
		
		
		if ($showField) {
		switch ( $option['type'] ) {
		
		//sectionstart
		case "sectionstart":
			echo '	<div id="'.$option['id'].'" class="section-content">';
			if ($option['desc'] && $option['desc'] !== '') { echo '<div class="section-desc"><i>'.$option['desc'].'</i></div>'; }
			
			if (($option['id'] == 'portfolio' || $option['id'] == 'import') && !is_plugin_active( 'avoc-portfolio/avoc-portfolio.php' )) { 
				echo '<div class="sr-import-message">ATTENTION<br>Please install and activate the required Avoc Portfolio plugin.</div>';
				echo '<div class="hide-content">'; 
			} else {
				echo '<div>'; 
			}
		break;
		
		
		//sectionend
		case "sectionend":
			echo '</div>';
			echo '</div>';
		break;
		
		
		//groupstart
		case "groupstart":
			echo '<div id="'.$option['id'].'" class="optiongroup">';
			echo '<div class="optiongroup-title"><h4>'.$option['label'].'</h4></div>';
			echo '<div class="optiongroup-content">';
		break;
		
		
		//groupend
		case "groupend":
			echo '	</div>'; // END optiongroup-content
			echo '	</div>'; // END optiongroup
		break;
		
		
		// hidinggroupstart
		case "hidinggroupstart":
			$relatedArray = explode(' ',$option['hiding']);
			$hideClass = '';
			foreach ($relatedArray as $r) { $hideClass .= $option['id'].'_'.$r.' '; }
			echo '<div class="hidinggroup hide'.$option['id'].' '.$hideClass.'">';
		break;
		
		
		// hidinggroupend
		case "hidinggroupend":
			echo '	</div>'; // END hidinggroup
		break;
		
		
		//info
		case "info":
			echo '<div class="option option-info clear">';
				echo '	<i>'.$option['desc'].'</i>';		
			echo '</div>';
		break;
		
		
		//text
		case "text":
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
						</div>';		
			echo '</div>';
		break;
		
		
		//color
		case "color":
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" class="sr-color-field" />
						</div>';		
			echo '</div>';
		break;
			
		
		//textarea
		case "textarea":
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<textarea name="'.$option['id'].'" id="'.$option['id'].'" cols="54" rows="14">'.$value.'</textarea>
						</div>';		
			echo '</div>';
		break;
			
		//checkbox
		case 'checkbox':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<input type="checkbox" style="display:none;" name="'.$option['id'].'" id="'.$option['id'].'" ',$value ? ' checked="checked"' : '','/>
							<a class="checkbox-status',$value ? '-active' : '','" href="" title="'.$option['id'].'">'.$option['id'].'</a>
						</div>';		
			echo '</div>';
		break;
		
		
		//radio
		case "radio":
			echo '<div class="option clear" id="sr_radio">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				$i = 0;
				foreach ($option['option'] as $var) {
					if ($value == $var['value']) { $checked = 'checked="checked"'; } else { if ($value == '' && $i == 0) { $checked = 'checked="checked"'; } else { $checked = '';  } }
					echo '<div><input type="radio" name="'.$option['id'].'" id="'.$var['value'].'" value="'.$var['value'].'" '.$checked.' /> '.$var['name'].'</div>';
				$i++;	
				}

				echo '	</div>';		
			echo '</div>';
		break;
		
		
		// selectbox  
		case 'selectbox':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<select name="'.$option['id'].'" id="'.$option['id'].'">';
				$i = 0;
				foreach ($option['option'] as $var) {
					if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
					echo '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
				$i++;	
				}			  
				echo '</select>'; 
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		// selectbox-hiding  
		case 'selectbox-hiding':  
			echo '<div class="option clear hiding'.$option['id'].'" id="hiding">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<select name="'.$option['id'].'" id="'.$option['id'].'">';
				$i = 0;
				foreach ($option['option'] as $var) {
					if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
					echo '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
				$i++;	
				}			  
				echo '</select>'; 
			echo '	</div>';		
			echo '</div>';
		break;
		
				
		// typo-body  
		case 'typo-body': 
			echo '<div class="option option_full clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<div class="value_half"><i>Family</i><br>';
				$valuefont = stripslashes(get_option( $option['id'].'-font')  );
				if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
				echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
				if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
				echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
				if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
				echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Size</i><br>';
				$valuesize = stripslashes(get_option( $option['id'].'-size')  );
				if ($valuesize == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuesize = $option['default'][3]; }
				echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Line Height</i><br>';
				$valueheight = stripslashes(get_option( $option['id'].'-height')  );
				if ($valueheight == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valueheight = $option['default'][4]; }
				echo '<select name="'.$option['id'].'-height" id="'.$option['id'].'-height">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($valueheight == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Letter Spacing</i><br>';
				$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
				if ($valuespacing == '' && (isset($option['default'][5]) && $option['default'][5] !== '')) { $valuespacing = $option['default'][5]; }
				echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
				$i = 0;
				foreach ($sr_fontspacing as $spacing) {
					if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="clear"></div><div class="value-separator">Responsive Sizes</div>';
				
				echo '<div class="value_third"><i>1024 Screen</i><br>';
				$value1024 = stripslashes(get_option( $option['id'].'-1024')  );
				if ($value1024 == '' && (isset($option['default'][6]) && $option['default'][6] !== '')) { $value1024 = $option['default'][6]; }
				echo '<select name="'.$option['id'].'-1024" id="'.$option['id'].'-1024">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($value1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;
				}
				echo '</select></div>';
				
				echo '<div class="value_third"><i>780 Screen</i><br>';
				$value780 = stripslashes(get_option( $option['id'].'-780')  );
				if ($value780 == '' && (isset($option['default'][7]) && $option['default'][7] !== '')) { $value780 = $option['default'][7]; }
				echo '<select name="'.$option['id'].'-780" id="'.$option['id'].'-780">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($value780 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;
				}
				echo '</select></div>';
				
				echo '<div class="value_third"><i>480 Screen</i><br>';
				$value480 = stripslashes(get_option( $option['id'].'-480')  );
				if ($value480 == '' && (isset($option['default'][8]) && $option['default'][8] !== '')) { $value480 = $option['default'][8]; }
				echo '<select name="'.$option['id'].'-480" id="'.$option['id'].'-480">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($value480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;
				}
				echo '</select></div>';
								
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		// typo-header  
		case 'typo-header': 
			echo '<div class="option option_full clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<div class="value_half"><i>Family</i><br>';
				$valuefont = stripslashes(get_option( $option['id'].'-font')  );
				if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
				echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
				if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
				echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
				if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
				echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Size</i><br>';
				$valuesize = stripslashes(get_option( $option['id'].'-size')  );
				if ($valuesize == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuesize = $option['default'][3]; }
				echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Letter Spacing</i><br>';
				$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
				if ($valuespacing == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuespacing = $option['default'][4]; }
				echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
				$i = 0;
				foreach ($sr_fontspacing as $spacing) {
					if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Text Transform</i><br>';
				$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
				if ($valuetransform == '' && (isset($option['default'][5]) && $option['default'][5] !== '')) { $valuetransform = $option['default'][5]; }
				echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
					if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
					echo '<option value="none" '.$selected1.' />'.__("None", 'sr_avoc_theme').'</option>';
					if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
					echo '<option value="uppercase" '.$selected2.' />'.__("Uppercase", 'sr_avoc_theme').'</option>';
				echo '</select></div>';
				
				echo '<div class="clear"></div><div class="value-separator">Responsive Sizes</div>';
				
				echo '<div class="value_third"><i>1024 Screen</i><br>';
				$value1024 = stripslashes(get_option( $option['id'].'-1024')  );
				if ($value1024 == '' && (isset($option['default'][6]) && $option['default'][6] !== '')) { $value1024 = $option['default'][6]; }
				echo '<select name="'.$option['id'].'-1024" id="'.$option['id'].'-1024">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($value1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;
				}
				echo '</select></div>';
				
				echo '<div class="value_third"><i>780 Screen</i><br>';
				$value780 = stripslashes(get_option( $option['id'].'-780')  );
				if ($value780 == '' && (isset($option['default'][7]) && $option['default'][7] !== '')) { $value780 = $option['default'][7]; }
				echo '<select name="'.$option['id'].'-780" id="'.$option['id'].'-780">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($value780 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;
				}
				echo '</select></div>';
				
				echo '<div class="value_third"><i>480 Screen</i><br>';
				$value480 = stripslashes(get_option( $option['id'].'-480')  );
				if ($value480 == '' && (isset($option['default'][8]) && $option['default'][8] !== '')) { $value480 = $option['default'][8]; }
				echo '<select name="'.$option['id'].'-480" id="'.$option['id'].'-480">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($value480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;
				}
				echo '</select></div>';
				
								
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		
		// typo-misc  
		case 'typo-misc': 
			echo '<div class="option option_full clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label>
							<br>
							<span class="option_desc" style="color:#2cbef4;"><i><strong>'.$option['desc'].'</strong></i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<div class="value_half"><i>Letter Spacing</i><br>';
				$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
				if ($valuespacing == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuespacing = $option['default'][0]; }
				echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
				$i = 0;
				foreach ($sr_fontspacing as $spacing) {
					if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_half"><i>Text Transform</i><br>';
				$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
				if ($valuetransform == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valuetransform = $option['default'][1]; }
				echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
					if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
					echo '<option value="none" '.$selected1.' />'.__("None", 'sr_avoc_theme').'</option>';
					if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
					echo '<option value="uppercase" '.$selected2.' />'.__("Uppercase", 'sr_avoc_theme').'</option>';
				echo '</select></div>';
				
								
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		
		
		
		// typo-sub  
		case 'typo-sub': 
			echo '<div class="option option_full clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<div class="value_half"><i>Family</i><br>';
				$valuefont = stripslashes(get_option( $option['id'].'-font')  );
				if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
				echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
				if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
				echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
				if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
				echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
								
				echo '<div class="value_half"><i>Letter Spacing</i><br>';
				$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
				if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
				echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
				$i = 0;
				foreach ($sr_fontspacing as $spacing) {
					if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_half"><i>Text Transform</i><br>';
				$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
				if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
				echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
					if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
					echo '<option value="none" '.$selected1.' />'.__("None", 'sr_avoc_theme').'</option>';
					if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
					echo '<option value="uppercase" '.$selected2.' />'.__("Uppercase", 'sr_avoc_theme').'</option>';
				echo '</select></div>';
																
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		
		// typo-nav  
		case 'typo-nav': 
			echo '<div class="option option_full clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<div class="value_half"><i>Family</i><br>';
				$valuefont = stripslashes(get_option( $option['id'].'-font')  );
				if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
				echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_half value_weight"><i>Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
				if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
				echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Size</i><br>';
				$valuesize = stripslashes(get_option( $option['id'].'-size')  );
				if ($valuesize == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuesize = $option['default'][2]; }
				echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
				$i = 0;
				foreach ($sr_fontsize as $height) {
					if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Letter Spacing</i><br>';
				$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
				if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
				echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
				$i = 0;
				foreach ($sr_fontspacing as $spacing) {
					if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_third"><i>Text Transform</i><br>';
				$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
				if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
				echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
					if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
					echo '<option value="none" '.$selected1.' />'.__("None", 'sr_avoc_theme').'</option>';
					if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
					echo '<option value="uppercase" '.$selected2.' />'.__("Uppercase", 'sr_avoc_theme').'</option>';
				echo '</select></div>';
				
								
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		
		// 	  
		case 'typo-button': 
			echo '<div class="option option_full clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				echo '<div class="value_half"><i>Family</i><br>';
				$valuefont = stripslashes(get_option( $option['id'].'-font')  );
				if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
				echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
				if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
				echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
				$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
				if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
				echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
				$i = 0;
				foreach ($sr_googlefonts as $font) {
					if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
						foreach ($weights as $w) {
							if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
						}
					} 
				$i++;	
				}			  
				echo '</select></div>';
												
				echo '<div class="value_half"><i>Letter Spacing</i><br>';
				$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
				if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
				echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
				$i = 0;
				foreach ($sr_fontspacing as $spacing) {
					if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
					echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
				$i++;	
				}			  
				echo '</select></div>';
				
				echo '<div class="value_half"><i>Text Transform</i><br>';
				$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
				if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
				echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
					if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
					echo '<option value="none" '.$selected1.' />'.__("None", 'sr_avoc_theme').'</option>';
					if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
					echo '<option value="uppercase" '.$selected2.' />'.__("Uppercase", 'sr_avoc_theme').'</option>';
				echo '</select></div>';
				
								
			echo '	</div>';		
			echo '</div>';
		break;
		
		
		
		
		//radiocustom
		case "radiocustom":
			echo '<div class="option clear" id="sr_radiocustom">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				
				$i = 0;
				foreach ($option['option'] as $var) {
					if ($value == $var['value']) { $checked = 'checked="checked"'; $active = "active"; } else { if ($value == '' && $i == 0) { $checked = 'checked="checked"'; $active = "active"; } else { $checked = ''; $active = ""; } }
					echo '<input type="radio" name="'.$option['id'].'" id="'.$var['value'].'" value="'.$var['value'].'" '.$checked.' />
					<a class="customradio '.$var['value'].' '.$active.'" href="'.$var['value'].'"><span>'.$var['name'].'</span></a>';
				$i++;	
				}

				echo '	</div>';		
			echo '</div>';
		break;
		
		
		// image  
		case 'image':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<input class="upload_image" type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" size="30" />
							<input class="upload_image_button sr-button" type="button" value="Add Image" /><br />
							<span class="preview_image"><img class="'.$option['id'].'"  src="'.$value.'" alt="" /></span>
						</div>';		
			echo '</div>';  
		break;
		
		
		// imagegroup  
		case 'imagegroup':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<input class="add_image_button sr-button" type="button" value="Add Slide" /><br />
							<textarea name="'.$option['id'].'" class="groupvalue" style="display:none;">'.$value.'</textarea><br />
							<ul id="imagegroup_preview" class="preview">';
						if ($value) {
							$value = substr($value, 3);
							$value = explode('~~~', $value);
					        foreach($value as $row) {
								$object = explode('|~|', $row);
								$id = $object[0];
								$caption = $object[1];
								$image = wp_get_attachment_image_src($id, 'full');
								echo '<li><a id="image-remove"  class="image-remove button" href="#" rel="'.$id.'">-</a><span class="image"><img src="'.$image[0].'"></span><textarea id="caption">'.$caption.'</textarea><textarea id="hidden-value" style="display:none;">~~~'.$id.'|~|'.$caption.'</textarea><a id="image-moveup"  class="button" href="#" rel="'.$id.'">&uarr;</a><a id="image-movedown"  class="button" href="#" rel="'.$id.'">&darr;</a></li>';
					        }  
					    } 		
				echo '			</ul>
						</div>';		
			echo '</div>';  
		break;
		
		
		// pagelist  
		case 'pagelist':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">
							<select name="'.$option['id'].'" id="'.$option['id'].'">';
							  $pages = get_pages(); 
							  foreach ( $pages as $page ) {
								if ($page->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
								$option = '<option value="' . $page->ID . '" '.$active.'>';
								$option .= $page->post_title;
								$option .= '</option>';
								echo $option;
							  }
				echo '		</select>
						</div>';		
			echo '</div>';  
		break;
		
		
		// organize  
		case 'organize':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
					echo '<div class="organize-option">';
					
					if ($value) {
						echo '<ul id="sortable" class="organize-list">';
						$tempvalue = substr($value, 0, -3);
						$tempvalue = explode('|||', $tempvalue);
						foreach ($tempvalue as $var) {
							$varvalue = explode('|', $var);
							if ($varvalue[2] == 'active') { $active = 'active'; } else { $active = ''; }
							echo '	<li class="ui-state-default '.$active.'">'.$varvalue[0].'<a class="status" href="" title="'.$varvalue[0].'"></a><input type="checkbox" name="'.$varvalue[1].'"/></li>';
						}
						echo '</ul>';
						echo '<textarea name="'.$option['id'].'" class="organize-value" style="display:none;">'.$value.'</textarea><br />';
					} else {
						echo '<ul id="sortable" class="organize-list">';
						$valueoutput = '';
						$i = 0;
						foreach ($option['option'] as $var) {
							echo '	<li class="ui-state-default">'.$var['name'].'<a class="status" href="" title="'.$var['name'].'"></a><input type="checkbox" name="'.$var['value'].'"/></li>';
							$valueoutput .= $var['name'].'|'.$var['value'].'|nonactive|||';
						$i++;	
						}
						echo '</ul>';
						echo '<textarea name="'.$option['id'].'" class="organize-value" style="display:none;">'.$valueoutput.'</textarea><br />';
					}
					echo '</div>';
				echo ' 	</div>';		
			echo '</div>';  
		break;
		
		
		// reset
		case 'reset':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				echo '	<a href="themes.php?page=option-panel.php&blogreset=views" class="button sr_button">'.__("Reset Views", 'sr_avoc_theme').'</a>';
				echo '	<a href="themes.php?page=option-panel.php&blogreset=likes" class="button sr_button">'.__("Reset Likes", 'sr_avoc_theme').'</a>';
				echo '	</div>';		
			echo '</div>';  
		break;
		
		
		// reset
		case 'resetportfolio':  
			echo '<div class="option clear">';
				echo '	<div class="option_name">
							<label for="'.$option['id'].'">'.$option['label'].'</label><br /><span class="option_desc"><i>'.$option['desc'].'</i></span>
						</div>';
				echo '	<div class="option_value">';
				echo '	<a href="themes.php?page=option-panel.php&portfolioreset=views" class="button sr_button">'.__("Reset Views", 'sr_avoc_theme').'</a>';
				echo '	<a href="themes.php?page=option-panel.php&portfolioreset=likes" class="button sr_button">'.__("Reset Likes", 'sr_avoc_theme').'</a>';
				echo '	</div>';		
			echo '</div>';  
		break;
		
		
		// import
		case 'import':  
			echo '<div class="sr-import-option">';
						
			echo '<div class="sr-demo-title">Choose a demo to import</div>';
			
			// CHECK IF DEMO HAS BEEN DONE ALREADY
			if (get_option($sr_prefix.'_import_state') == 'true') {
				echo '<div class="sr-import-message">ATTENTION<br>You already imported a demo.  Import another one will create double content. If you want to install another one, I recommend to reset the wordpress installtion first using the plugin "Wordpress reset".  This delete/resets all your content,settings, etc.</div>'; }
		
			$demos = array(
				array( "name" => "Main",
					   "desc" => "with slider",
					   "id" => "demo-one"
					   ),
				array( "name" => "Creative Portfolio",
					   "desc" => "colored captions",
					   "id" => "demo-two"
					   ),
				array( "name" => "Photography",
					   "desc" => "minimal",
					   "id" => "demo-three"
					   ),
				array( "name" => "Masonry",
					   "desc" => "portfolio",
					   "id" => "demo-four"
					   )	   
				
				);
			
			echo '<div class="sr-import-demos">';
			foreach ($demos as $d) {
				echo '<a href="themes.php?page=option-panel.php&importoptions=avoc-'.$d['id'].'" class="sr-demo '.$d['id'].'">
				<span class="demo-name">'.$d['name'].'</span>
				<span class="demo-desc">'.$d['desc'].'</span>
				<span class="demo-install">import</span>
				</a>';
			}
			echo '</div>';	
			
			echo '<div class="sr-message"><em>The Agency Homepage with background video is included in all 4 demos.</em></div>';
			
			/*echo '<div class="sr-maximum-message">NOTE<br>Make sure your maximum upload size is at least 32GB (Check it here: Media > Add new)<br> Otherwhise it will lead to a internal server error.</div>';*/
			echo '<div class="sr-import-loader"><div class="importing-text">importing ...</div></div>';
						
			echo '</div>';	
			
		break;
		
		
		} // END switch ( $option['type'] ) {
		} // END if showFields
	} // END foreach ($sr_options_new as $option) {
	
	
	echo '</div>'; // END section-content
	echo '</div>'; // END section



echo '	
		<div class="sr_footer clear">
		<input name="save" type="submit" value="Save all changes" class="submit-option"/> 
		<input type="hidden" name="action" value="save" />
		</form>
		<form method="post">
		<!--<input name="reset" type="submit" value="Reset" class="reset-option" />
		<input type="hidden" name="action" value="reset" />-->
		</form>
		</div>
		</div> ';
 

} // END function sr_theme_interface() {




/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue admin javascript
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'sr_admin_js' ) ) {
    function sr_admin_js($hook) {
		global $sr_version;
		
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		
		wp_enqueue_script('media-upload');
		wp_enqueue_style('thickbox');
		
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );
		
		wp_register_script('admin-script', get_template_directory_uri().'/theme-admin/option-panel/js/admin_script.js', array( 'wp-color-picker' ), $sr_version, true);
		wp_enqueue_script('admin-script');
		
		wp_register_style('admin-style', get_template_directory_uri() . '/theme-admin/option-panel/css/admin.css','',$sr_version);
		wp_enqueue_style('admin-style');
			
		wp_enqueue_media();
    }
    
    add_action('admin_enqueue_scripts','sr_admin_js',10,1);
}


/*-----------------------------------------------------------------------------------*/
/* Output Custom CSS from theme options
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'sr_head_css' ) ) {
    function sr_head_css() {
        global $sr_prefix;
        $output = '';
        $output = get_option($sr_prefix.'_color');
    }

    add_action('wp_head', 'sr_head_css');
}
?>