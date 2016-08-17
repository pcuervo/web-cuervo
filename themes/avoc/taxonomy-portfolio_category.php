<?php

//get global prefix
global $sr_prefix;

//get template header
get_header();

// GET OPTIONS
$gridType = get_option($sr_prefix.'_portfoliotype');
$gridSize = get_option($sr_prefix.'_portfoliogridsize');

?>
		
		<div class="<?php echo esc_attr($gridSize); ?>"> 
		
			<?php 
            /*
            ** GET CATEGORIES TO SHOW
            */
        
            $sr_portfoliocount = get_option($sr_prefix.'_portfoliocount');
            
           $query = new WP_Query(array(
                'posts_per_page'=> -1,	// -1 because 404 bug if pagination
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                'portfolio_category' => get_query_var('portfolio_category'),
                'post_type' => array('portfolio')
            ));
            
            $related = 'portfolio-grid-category';
            ?>
                        
            <?php if ($gridType == 'wolf') { 
				$parallax = get_option($sr_prefix.'_portfoliowolfparallax');
				$captionparallax = get_option($sr_prefix.'_portfoliowolfcaptionparallax');
				$offset = get_option($sr_prefix.'_portfoliowolfoffset');
				$mouseparallax = get_option($sr_prefix.'_portfoliowolfmouseparallax');
				$hover = get_option($sr_prefix.'_portfoliowolfhover');
				$captionposition = get_option($sr_prefix.'_portfoliowolfcaption');
			?>
            
			<div id="<?php echo esc_attr($related); ?>" class="wolf-grid portfolio-wolf" data-parallax="<?php echo esc_attr($parallax); ?>" data-captionparallax="<?php echo esc_attr($captionparallax); ?>" data-randomhorizontaloffset="<?php echo esc_attr($offset); ?>" data-mouseparallax="<?php echo esc_attr($mouseparallax); ?>">
            	<?php  while ($query->have_posts()) { $query->the_post(); get_template_part( 'includes/loop', 'portfolio'); } ?>
            </div>
            
            <?php } else if ($gridType == 'masonry' || $gridType == 'classic') { 
				$size = get_option($sr_prefix.'_portfoliothumbsize');
				$spacing = get_option($sr_prefix.'_portfoliospacing');
				$hover = get_option($sr_prefix.'_portfoliohover');
				$category = get_option($sr_prefix.'_portfoliogridcategory');
			?>
            
            <div id="<?php echo esc_attr($related); ?>" class="masonry portfolio-masonry spacing-<?php echo esc_attr($spacing); ?> clearfix" data-maxitemwidth="<?php echo esc_attr($size); ?>"> 
            	<?php  while ($query->have_posts()) { $query->the_post(); get_template_part( 'includes/loop', 'portfolio'); } ?>   
            </div>
                
            <?php }  ?>
            
            <?php sr_pagination('portfolio',__('Older Projects', 'sr_avoc_theme'), __('Newer Projects', 'sr_avoc_theme')); ?>
            
                        
<?php get_footer(); ?>