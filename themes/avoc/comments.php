<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	{ die (__('Please do not load this page directly!', 'sr_avoc_theme')); }

if ( post_password_required() ) { ?>
	<p class="password_required"><?php _e('The comments is password protected. Enter your password.', 'sr_avoc_theme'); ?></p>
<?php
	return;
}
?>

<?php 
global $sr_prefix;
?>

			<?php if ( comments_open() )  { ?>

                <?php if ( have_comments() ) { 
						$comments_amount = get_comment_count($post->ID);
						if ($comments_amount['approved'] > 0) {
				?>
                		
               		<div id="blog-comments">
                		<div class="wrapper">
                            <h4><strong><?php _e('Comments', 'sr_avoc_theme'); ?> <em>(<?php comments_number('','1','%'); ?>)</em></strong></h4>
                            <ul class="comment-list">
                                <?php wp_list_comments('type=comment&callback=sr_comment'); ?>
                            </ul>
                            <?php paginate_comments_links(); ?>
                        </div> 
              		 </div> <!-- END #comments -->    
                              
                    <?php }  ?>
                <?php } ?>
                                
                	<div id="blog-leavecomment">
                    	<div class="wrapper">
                      	<?php 
							global $sr_comments_defaults;
							comment_form($sr_comments_defaults);    
						?> 
                        </div>
                    </div> <!-- END #leavecomment -->
                
			<?php } ?> 