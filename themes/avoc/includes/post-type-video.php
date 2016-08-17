<?php

global $sr_prefix;

$video = get_post_meta($post->ID, $sr_prefix.'_video', true);
$embedded = get_post_meta($post->ID, $sr_prefix.'_video_embedded', true);
$m4v = get_post_meta($post->ID, $sr_prefix.'_video_m4v', true);
$ogv = get_post_meta($post->ID, $sr_prefix.'_video_oga', true);
$webmv = get_post_meta($post->ID, $sr_prefix.'_video_webmv', true);
$poster = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$postid = $post->ID;

if( $video == 'embedded' && ($embedded !== '' || !empty($embedded)) ) {
?>	
    <div class="blog-media">
		<?php echo $embedded; ?>
	</div> <!-- END .entry-media -->
    
<?php	
} else if ($video == 'selfhosted' && (!empty($m4v) || !empty($ogv))) {
	?>
    
    <div class="blog-media">
            
            <script type="text/javascript">				
				jQuery(document).ready(function(){
		
					if(jQuery().jPlayer) {
						jQuery("#jquery_jplayer<?php if (is_single()) { echo '_single'; } echo esc_js($postid); ?>").jPlayer({
							ready: function () {
								jQuery(this).jPlayer("setMedia", {
									<?php if($m4v != '') : ?>
                                    m4v: "<?php echo esc_js($m4v); ?>",
                                    <?php endif; ?>
									<?php if($ogv != '') : ?>
                                    ogv: "<?php echo esc_js($ogv); ?>",
                                    <?php endif; ?>
                                    <?php if($webmv != '') : ?>
                                    webmv: "<?php echo esc_js($webmv); ?>",
                                    <?php endif; ?>
									<?php if($poster != '') : ?>
                                    poster: "<?php echo esc_js($poster); ?>"
                                    <?php endif; ?>
								});
							},
							size: {
					          width: "100%",
					          height: "auto"
					        },
							swfPath: "<?php echo get_template_directory_uri(); ?>/files/jplayer",
							cssSelectorAncestor: "#jp_interface<?php echo esc_js($postid); ?>",
							supplied: "<?php if($ogv != '') : ?>ogv,<?php endif; ?><?php if($m4v != '') : ?>m4v,<?php endif; ?><?php if($webmv != '') : ?>webmv,<?php endif; ?>all"
						});
					}
				});
            </script>
        
            <div id="jquery_jplayer<?php if (is_single()) { echo '_single'; } echo esc_attr($postid); ?>" class="jp-jplayer jp-jplayer-video"></div>

           <div class="jp-video-container">
                <div class="jp-video">
                    <div class="jp-type-single">
                        <div id="jp_interface<?php echo esc_attr($postid); ?>" class="jp-interface">
                            <ul class="jp-controls">

                                <li><div class="seperator-first"></div></li>
                                <li><div class="seperator-second"></div></li>
                                <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                            </ul>

                            <div class="jp-progress-container">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                        <div class="jp-play-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="jp-volume-bar-container">
                                <div class="jp-volume-bar">

                                    <div class="jp-volume-bar-value"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
               
<?php
}
?>