<?php
/*
* Main Blog page
*/

//get global prefix
global $sr_prefix;

//get template header
get_header();

$size = 420;
$fullwidth = "false"; if (get_option($sr_prefix.'_blogentriesfullwidth')) { $fullwidth = get_option($sr_prefix.'_blogentriesfullwidth'); }
if ($fullwidth == 'true') { $wrapperSize = 'wrapper-full'; } else { $wrapperSize = 'wrapper'; }
$wrapperSize = 'wrapper';

?>
		        
        <div id="blog-wrapper" class="<?php echo esc_attr($wrapperSize); ?>">
                
            <?php
            //** QUERY IF SEARCH
            if (get_query_var('s')) {
				
				$sArray = array('post','page','portfolio');
				if (get_option($sr_prefix.'_headersearcharea')) { 
					$sArray = explode(",", get_option($sr_prefix.'_headersearcharea'));
				}
				
                $query = new WP_Query(array(
                    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                    's' => get_query_var('s'),
                    'post_type' => $sArray
                ));
            
            //** NO POST INFO
            if (!have_posts()) { 
				echo '<div class="wrapper nopost"><h3 class="alttitle">'.__("No posts has been found!", 'sr_avoc_theme').'</h3></div>'; 
				echo '<div class="spacer spacer-big"></div>';
			} else {
            ?>
                        
            <div id="search-grid" class="masonry search-entries spacing-small clearfix" data-maxitemwidth="<?php echo esc_attr($size); ?>">
                
                <?php while ($query->have_posts()) : $query->the_post();  ?>
				<div class="search-masonry-entry masonry-item">
						
					<?php if(has_post_thumbnail()) { ?>
                    <div class="search-media">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb-small'); ?></a>
                    </div>
                    <?php } ?>
                    
                    <div class="search-content">
                        <div class="search-headline">
                            <h5 class="post-name"><a href="<?php the_permalink(); ?>" class="transition"><strong>
                            <?php if (get_post_meta(get_the_ID(), $sr_prefix.'_alttitle', true)) { 
                                echo get_post_meta(get_the_ID(), $sr_prefix.'_alttitle', true); }
                                else { the_title(); } ?></strong></a></h5>
                           	<h6 class="alttitle post-type"><?php echo get_post_type($post); ?></h6>
                        </div>
                        <p><a href="<?php the_permalink(); ?>" class="sr-button-text"><?php _e("Read More", 'sr_avoc_theme'); ?></a></p>
                    </div>
                    
                </div>
                <?php endwhile; ?>
                
            </div> <!-- END #blog-entries -->
                        
            <?php if ($query->max_num_pages > 1) { ?>
            <div class="wrapper">
                <?php sr_pagination('blog',__('Previous Page', 'sr_avoc_theme'), __('Next Page', 'sr_avoc_theme')); ?>  
            </div>
            <?php } ?>
            
            <?php } // END else have_post
			
			} else {
				echo '<div class="wrapper nopost"><h3 class="alttitle">'.__("You didn't specify any Search!", 'sr_avoc_theme').'</h3></div>'; 
				echo '<div class="spacer spacer-big"></div>';
			} ?>

        </div>

<?php get_footer(); ?>