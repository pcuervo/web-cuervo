<?php
/*
Template Name: Portfolio
*/

//get global prefix
global $sr_prefix;

//get template header
get_header();

// GET OPTIONS
$gridType = get_option($sr_prefix.'_portfoliotype');
$gridSize = get_option($sr_prefix.'_portfoliogridsize');

$content_post = get_post(get_the_ID());
$content = $content_post->post_content;
?>

		<?php if (isset($content) && $content !== '') { echo apply_filters('the_content', $content); } ?>
			
        <div class="<?php echo esc_attr($gridSize); ?>"> 
            
            <?php 
                /*
                ** GET CATEGORIES TO SHOW
                */
            
                $category = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliocategories', true);
                if (get_query_var('portfolio_category')) { $category = get_query_var('portfolio_category'); }
                $sr_portfoliocount = get_option($sr_prefix.'_portfoliocount');
                
                if ($category[0] == '') {
                    $allCatsTmp = get_terms( 'portfolio_category');
                    $category = array();
                    foreach ($allCatsTmp as $c) { $category[] = $c->slug; }
                }
                
                if (count($category) < 1) { $taxquery = false; } else {
                    $taxquery = array(	array(
                                    'taxonomy' => 'portfolio_category',
                                    'field' => 'slug',
                                    'terms' => $category
                                ));
                }					
                                 
                if ( get_option( 'page_on_front' ) == get_the_ID() ) { $pagenumber = ( get_query_var('page') ? get_query_var('page') : 1 ); } 
                else { $pagenumber = ( get_query_var('paged') ? get_query_var('paged') : 1 ); }  
                
                $query = new WP_Query(array(
                    'posts_per_page'=> $sr_portfoliocount,
                    'paged' => $pagenumber,
                    'm' => get_query_var('m'),		   
                    'w' => get_query_var('w'),
                    'post_type' => array('portfolio'),
                    'tax_query' => $taxquery
                ) );
                
                $related = 'portfolio-grid-'.$post->post_name;
            ?>
            
            <?php if (!have_posts($query)) { echo '<div class="nopost"><h3>'.__("No posts has been found!", 'sr_avoc_theme').'</h3></div>'; } ?>
            
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
                       
        </div>
                        
<?php get_footer(); ?>