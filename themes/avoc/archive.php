<?php
/*
* Main Blog page
*/

//get global prefix
global $sr_prefix;
global $wp_query;

//get template header
get_header();

$size = 600; if (get_option($sr_prefix.'_blogentriessize')) { $size = get_option($sr_prefix.'_blogentriessize'); }


?>
		        
        <div class="wrapper">
                
            <?php
            //** NO POSTS
            if (!have_posts()) { 
				echo '<div class="wrapper nopost"><h3 class="alttitle">'.__("No posts has been found!", 'sr_avoc_theme').'</h3></div>'; 
				echo '<div class="spacer spacer-big"></div>';
			} else {
            ?>
                        
            <div id="blog-grid" class="masonry blog-entries masonry-spaced clearfix" data-maxitemwidth="<?php echo esc_attr($size); ?>">
                <?php get_template_part( 'includes/loop', 'blog'); ?>
            </div> <!-- END #blog-entries -->
                        
            <?php if ($query->max_num_pages > 1) { ?>
            <div class="wrapper">
                <?php sr_pagination('blog',__('Older Post', 'sr_avoc_theme'), __('Newer Post', 'sr_avoc_theme')); ?>  
            </div>
            <?php } ?>
            
            <?php } // END else have_post ?>

        </div>

<?php get_footer(); ?>