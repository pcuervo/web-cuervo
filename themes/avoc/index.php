<?php
/*
* Main Blog page
*/

//get global prefix
global $sr_prefix;
global $wp_query;

//get template header
get_header();

if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  }

$blog = false; if (get_post(get_option( 'page_for_posts' ))) { $blog = get_post(get_option( 'page_for_posts' )); $slug = $blog->post_name; }

$style = "masonry"; if (get_option($sr_prefix.'_blogentriesstyle')) { $style = get_option($sr_prefix.'_blogentriesstyle'); }
$size = 600; if (get_option($sr_prefix.'_blogentriessize')) { $size = get_option($sr_prefix.'_blogentriessize'); }
$fullwidth = "false"; if (get_option($sr_prefix.'_blogentriesfullwidth')) { $fullwidth = get_option($sr_prefix.'_blogentriesfullwidth'); }

if ($fullwidth == 'true' && $style == 'masonry') { $wrapperSize = 'wrapper-full'; } else { $wrapperSize = 'wrapper'; }

$sidebar = "false"; if (get_option($sr_prefix.'_blogsidebar')) { $sidebar = get_option($sr_prefix.'_blogsidebar'); }
if ($sidebar == 'true') {
	$sidebarPos = 'right-float';
	$contentPos = 'left-float';
	$sidebarPos = get_option($sr_prefix.'_blogsidebarposition');
	if ($sidebarPos == 'right-float') { $contentPos = 'left-float'; } else { $contentPos = 'right-float'; }
	$sidebarStyle = get_option($sr_prefix.'_blogsidebarstyle');
	if ($sidebarStyle == 'sidebar-dark') { $sidebarStyle .= ' text-light'; }
} 
?>
		        
        <div id="blog-wrapper" class="<?php echo esc_attr($wrapperSize); ?>">
                        
            <?php
            //** NO POST INFO
            if (!have_posts()) { 
				echo '<div class="wrapper nopost"><h3 class="alttitle">'.__("No posts has been found!", 'sr_avoc_theme').'</h3></div>'; 
				echo '<div class="spacer spacer-big"></div>';
			} else {
            ?>
            
            <?php if ($sidebar == 'true') { ?><div class="sidebar-content <?php echo esc_attr($contentPos); ?>"><?php } ?>
            
			<?php if ($style == 'masonry') { ?>
            
            <div id="blog-grid" class="masonry blog-entries clearfix" data-maxitemwidth="<?php echo esc_attr($size); ?>">
                <?php get_template_part( 'includes/loop', 'blog'); ?>
            </div> <!-- END #blog-entries -->
            
            <?php } ?>
            
            <?php if ($query->max_num_pages > 1) { ?>
            <div class="wrapper">
                <?php sr_pagination('blog',__('Older Post', 'sr_avoc_theme'), __('Newer Post', 'sr_avoc_theme')); ?>  
            </div>
            <?php } ?>
            
            <?php if ($sidebar == 'true') { ?></div>
            <aside id="sidebar" class="<?php echo esc_attr($sidebarPos); ?> <?php echo esc_attr($sidebarStyle); ?>">
            	<?php get_sidebar(); ?>
            </aside>
            <div class="clear"></div>
			<?php } ?>
            
            <?php } // END else have_post ?>

        </div>

<?php get_footer(); ?>