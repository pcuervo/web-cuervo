 	<?php
//get global prefix
global $sr_prefix;
global $query;
if ($query) { $query = $query; } else { $query = $wp_query; }

$readmore = get_option($sr_prefix.'_blogentriesreadmore');
$style = "masonry"; if (get_option($sr_prefix.'_blogentriesstyle')) { $style = get_option($sr_prefix.'_blogentriesstyle'); }

if ($style !== 'standard') { $entryClass = 'blog-masonry-entry masonry-item'; } else { $entryClass = 'blog-list-entry'; }

while ($query->have_posts()) : $query->the_post(); 

?>  
		
                   	<div class="blog-masonry-entry masonry-item">
						
                        <?php if(has_post_thumbnail()) { ?>
                        <div class="blog-media">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumb-big'); ?>
                            </a>
						</div>
                        <?php } ?>
                        
                        <div class="blog-content">
							<div class="blog-headline">
								<span class="time"><?php the_time('M j, Y') ?></span>
								<h5 class="post-name"><a href="<?php the_permalink(); ?>" class="transition"><strong>
								<?php if (get_post_meta(get_the_ID(), $sr_prefix.'_alttitle', true)) { 
									echo get_post_meta(get_the_ID(), $sr_prefix.'_alttitle', true); }
									else { the_title(); } ?></strong></a></h5>
                                <?php if (post_password_required()) { echo '<h6 class="alttitle post-protected">'.__("Password Protected", 'sr_avoc_theme').'</h6>'; }?>
                                <?php if (is_sticky()) { ?><div class="post-sticky"><?php _e("Featured", 'sr_avoc_theme'); ?></div><?php } ?>
							</div>
                            <?php if (get_option($sr_prefix.'_blogentriesexcerpt') == 'true') {
                            	 	echo sr_content('excerpt', 30, false); 
								} ?>
                            <?php if (!$readmore) { ?>
                            <p><a href="<?php the_permalink(); ?>" class="sr-button-text"><?php _e("Read More", 'sr_avoc_theme'); ?></a></p>
                            <?php } ?>
						</div>
                        
					</div>
                
<?php endwhile; ?>