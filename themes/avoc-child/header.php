<?php 
global $sr_prefix;
$theId = sr_getId();

$lang = isset( $_GET['lang'] ) ? $_GET['lang'] : 'es';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- DEFAULT META TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php sr_get_social_metas(); ?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if (!get_option($sr_prefix.'_disablepreloader')) { ?>
<!-- PAGELOADER -->
<div id="page-loader">
	<div class="page-loader-inner">
		<div class="loader"><strong><?php _e("Loading","sr_avoc_theme"); ?></strong></div>
	</div>
</div>
<!-- PAGELOADER -->
<?php } ?>

<!-- PAGE CONTENT -->
<div id="page-content">
	
	<?php
		/* HEADER SETTINGS */
		$classHeader = ''; 
		if (get_option($sr_prefix.'_headermenuappearence') == 'classic') { $classHeader .= ' header-open'; }
		if (get_option($sr_prefix.'_headertransparent') == 'true') { $classHeader .= ' header-transparent'; }
		if (get_option($sr_prefix.'_headersticky') == 'false') { $classHeader .= ' non-fixed'; }
		if (get_option($sr_prefix.'_headerlogomenu') == 'opposite') { $classHeader .= ' opposite'; }
		if (get_option($sr_prefix.'_headerpadding')) { $classHeader .= ' margin-'.get_option($sr_prefix.'_headerpadding'); }
		
		$logoMenuAppearance = get_post_meta($theId, $sr_prefix.'_headerappearance', true);
		if (is_404() || is_tag() || is_category() || is_search() || is_author() || is_archive() || 
		get_post_meta($theId, $sr_prefix.'_showpagetitle', true) == 'false' ||
		get_post_meta($theId, $sr_prefix.'_showpagetitle', true) == 'default') { $logoMenuAppearance = 'dark';}
		
		$checkRevSlider = get_post_meta($theId, $sr_prefix.'_showpagetitle', true);
		$headerhide = get_post_meta($theId, $sr_prefix.'_header_hide', true);
		/* HEADER SETTINGS */
		
	?>
	
    <?php if ($checkRevSlider == 'slider' && $headerhide == 'true') { } else { ?>
	<!-- HEADER -->
	<header id="header" class="<?php echo esc_attr($classHeader); ?>">        
		<div class="header-inner clearfix">
			
          	<div id="logo" class="<?php if (get_option($sr_prefix.'_headerlogomenu') == 'opposite') { ?>right-float<?php } else { ?>left-float<?php } ?> show-<?php echo esc_attr($logoMenuAppearance); ?>-logo">
				<?php if (get_option($sr_prefix.'_logodark')) { ?><a id="dark-logo" class="logotype" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_option($sr_prefix.'_logodark')); ?>" alt="Logo"></a><?php } ?>
				<?php if (get_option($sr_prefix.'_logolight')) { ?><a id="light-logo" class="logotype" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_option($sr_prefix.'_logolight')); ?>" alt="Logo"></a><?php } ?>
            </div>
                           
				
			<?php if(has_nav_menu('primary-menu')) {  ?>
            <div id="menu" class="<?php if (get_option($sr_prefix.'_headerlogomenu') == 'opposite') { ?>left-float<?php } else { ?>right-float<?php } ?> clearfix menu-<?php echo esc_attr($logoMenuAppearance); ?>">
                <a href="#" class="open-nav"><span class="hamburger"></span><span class="text"><?php _e("Menu","sr_avoc_theme"); ?></span></a>
                
				<?php	
                    wp_nav_menu( array(  
                            'theme_location'  => 'primary-menu', 
                            'container'       => 'nav',  			        
                            'container_id'    => 'main-nav',  
                            'container_class' => '',  
                            'menu_class'      => '', 
                            'menu_id'         => 'primary' ,
                            'before'          => '',
                            'after'           => ''
                  	) );  
                ?>
                
                <?php if (!get_option($sr_prefix.'_disableheadersearch')) { ?>
                <a href="#" class="open-search"></a>
                <?php } ?>
                
                <?php if (get_post_meta($theId, $sr_prefix.'_portfoliofilter', true) == 'true' && is_page_template( 'template-portfolio.php' )) { 
					$related = 'portfolio-grid-'.$post->post_name;
					$displayClass = '';
					if (get_post_meta($theId, $sr_prefix.'_portfoliofilteroption', true) == 'start') { $displayClass = 'displaystart'; }
				?>

                <?php if( 'es' == $lang ) : ?>
                    <a href="#" class="open-filter <?php echo esc_attr($displayClass); ?>" data-related-grid="<?php echo esc_attr($related); ?>"><?php _e("Filtro","sr_avoc_theme"); ?></a>

                <?php else : ?>
                    <a href="#" class="open-filter <?php echo esc_attr($displayClass); ?>" data-related-grid="<?php echo esc_attr($related); ?>"><?php _e("Filter","sr_avoc_theme"); ?></a> 
                <?php endif; ?>  
                   
                    <?php } ?>
                
                
                <?php if ((get_post_type() == 'portfolio' && !get_option($sr_prefix.'_portfolioshare')) ||
						  (is_single() && get_post_type() == 'post' && !get_option($sr_prefix.'_blogpostshare')) ) { ?>
                <a href="#" class="open-share"><?php _e("Share","sr_avoc_theme"); ?></a>
                <?php } ?>
                                
            </div>
            <?php } // END if has_nav_menu ?>
            
            <?php if (get_post_meta($theId, $sr_prefix.'_portfoliofilter', true) == 'true' && is_page_template( 'template-portfolio.php' )) { ?>
            <div id="header-filter">
            	<div class="filter-inner align-center">
                    <a href="#" class="close-filter"></a>
                	<h5 class="title-filter"><strong><?php _e("Filter","sr_avoc_theme"); ?></strong></h5>
                    <?php sr_filter('portfolio-filter',get_option($sr_prefix.'_portfoliotype').'-filter clearfix',$related); ?>
                </div>
            </div>
            <?php } ?>
            
            <?php if ((get_post_type() == 'portfolio' && !get_option($sr_prefix.'_portfolioshare')) ||
						  (get_post_type() == 'post' && !get_option($sr_prefix.'_blogpostshare')) ) { ?>
            <div id="header-share">
            	<div class="share-inner align-center">
                    <a href="#" class="close-share"></a>
                	<h5 class="title-share"><strong><?php _e("Share","sr_avoc_theme"); ?></strong></h5>
                    <?php sr_Share(get_post_type()); ?>
                </div>
            </div>
            <?php } ?>
            
            <?php if (!get_option($sr_prefix.'_disableheadersearch')) { ?>
            <div id="header-search">
            	<div class="search-inner align-center">
                    <a href="#" class="close-search"></a>
                    <form role="search" method="get" id="header-searchform" class="searchform" action="<?php echo home_url(); ?>">
                        <input type="text" value="" name="s" id="s" placeholder="Enter Your Search ..." />
						<input type="submit" id="searchsubmit" value="Search" />
					</form>
                	<h6 class="title-search alttitle"><?php _e("... and press enter to start","sr_avoc_theme"); ?></h6>
                </div>
            </div>
            <?php } ?>
                    
		</div> <!-- END .header-inner -->
	</header> <!-- END header -->
	<!-- HEADER -->
    <?php } ?>
	
    <?php if ( !is_404() ) { ?>
    
	<?php $inHeader = true; include(locate_template('includes/page-title.php')); $inHeader = false; ?>
    
	<!-- PAGEBODY -->
	<div id="page-body">
    	
    <?php } ?>