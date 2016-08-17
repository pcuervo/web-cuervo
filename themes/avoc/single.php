<?php

//get global prefix
global $sr_prefix;

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }

$sidebar = "false"; if (get_option($sr_prefix.'_blogsidebar')) { $sidebar = get_option($sr_prefix.'_blogsidebar'); }
$sidebarSingle = get_option($sr_prefix.'_blogsidebarsingle');
if ($sidebar == 'true' && $sidebarSingle == 'true') {
	$sidebarPos = 'right-float';
	$contentPos = 'left-float';
	$sidebarPos = get_option($sr_prefix.'_blogsidebarposition');
	if ($sidebarPos == 'right-float') { $contentPos = 'left-float'; } else { $contentPos = 'right-float'; }
	$sidebarStyle = get_option($sr_prefix.'_blogsidebarstyle');
	if ($sidebarStyle == 'sidebar-dark') { $sidebarStyle .= ' text-light'; }
}

$wrapper = "wrapper";
if ( (!get_option($sr_prefix.'_blogpostmeta') || get_option($sr_prefix.'_blogpostmeta') == "false") &&  (!$sidebarSingle || $sidebarSingle == 'false')) { 
	$wrapper = "wrapper-small";
}
?>
		
        <div id="blog-single" <?php post_class(); ?>>
        	<div class="blog-content <?php echo esc_attr($wrapper); ?> clearfix">
               	
                <?php if (post_password_required()) { ?>
            		<div class="wrapper-small align-center">
                    <?php the_content(); ?>
                    </div>
                    <?php if (get_option($sr_prefix.'_blogpostpagination')) { ?><div class="spacer spacer-big"></div><?php } ?>
           		<?php } else { ?>
                	
                    <?php if ($sidebar == 'true' && $sidebarSingle == 'true') { ?><div class="sidebar-content <?php echo esc_attr($contentPos); ?>"><?php } ?>
                    
					<?php if ( get_option($sr_prefix.'_blogpostmeta') == "true" ) { ?>
                    <div class="blog-meta">
						<?php echo sr_getBlogMeta(); ?>
                    </div>
                    <?php } ?>	
                    
                    <div class="blog-text">            
                        <?php if ($format == 'video' || $format == 'gallery' || $format == 'audio') { get_template_part( 'includes/post-type', $format ); } ?>
                
                        <div class="blog-content">
                        <?php the_content(); ?>
                        </div> <!-- END .blog-content -->
                        
                        <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sr_avoc_theme' ) . '</span>',
                                'after'       => '</div>',
                            ) ); ?>
                    </div>
                    
                    <?php if ($sidebar == 'true' && $sidebarSingle == 'true') { ?></div>
                    <aside id="sidebar" class="<?php echo esc_attr($sidebarPos); ?> <?php echo esc_attr($sidebarStyle); ?>">
                        <?php get_sidebar(); ?>
                    </aside>
                    <div class="clear"></div>
                    <?php } ?>
                
                <?php } // END if password ?>
                
        	</div>
            
			<?php
            if ( !get_option($sr_prefix.'_blogpostpagination')) {
                $back = false;
                if (!get_option($sr_prefix.'_blogbacklink')) { $back = __( 'Back to Posts', 'sr_avoc_theme' );  }
                sr_singlepagination('blog','blogsingle-pagination','single-pagination ',__( 'Previous Post', 'sr_avoc_theme' ),__( 'Next Post', 'sr_avoc_theme' ),$back);  
            }
            if (get_option($sr_prefix.'_blogcomments')) { echo '<div class="spacer spacer-big"></div>'; }
            ?>
                
            <?php if (!get_option($sr_prefix.'_blogcomments') && comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
              
		</section>
        
<?php endwhile; endif; ?>
<?php get_footer(); ?>