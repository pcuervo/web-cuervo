<?php

//get global prefix
global $sr_prefix;

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

$pTop = '';
if (get_post_meta(get_the_ID(), $sr_prefix.'_paddingtop', true) == 'false') { $pTop = "notoppadding"; }

// title options
$showPagetitle = "default"; $showPagetitle = get_post_meta(get_the_ID(), $sr_prefix.'_showpagetitle', true);
if ($showPagetitle == "default" || $showPagetitle == "false") { $pTop = "notoppadding"; }

?>

		<!-- SECTION PORTFOLIO -->
		<section id="portfolio-single" class="<?php echo esc_attr($pTop); ?>">
			<div class="section-inner">				
           	
            <?php if (post_password_required()) { ?>
            	<div class="wrapper-small align-center">
				<?php the_content(); ?>
                </div>
                <?php if (get_option($sr_prefix.'_portfoliopagination')) { ?><div class="spacer spacer-big"></div><?php } ?>
            <?php } else { ?>
            	
				<?php if  (get_the_content() != '') { ?>
                    <?php the_content(); ?>
                <?php } ?>
                
            <?php } // END if password ?>
                
			<?php 
            if (!get_option($sr_prefix.'_portfoliopagination')) {
                $back = false;
                if (get_option($sr_prefix.'_portfoliobacklink') == 'true') { $back = __( 'Back to Works', 'sr_avoc_theme' );  }
                echo '<div class="wrapper">';
                sr_singlepagination('portfolio','portfoliosingle-pagination','single-pagination ',__( 'Previous Project', 'sr_avoc_theme' ),__( 'Next Project', 'sr_avoc_theme' ),$back);  
                echo '</div>';
            }
            wp_link_pages();
            ?>
                
            <?php if (!get_option($sr_prefix.'_portfoliocomments') && comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
            
			</div>
		</section>
		<!-- SECTION PORTFOLIO -->
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>