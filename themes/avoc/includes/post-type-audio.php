<?php

global $sr_prefix;

$audio = get_post_meta($post->ID, $sr_prefix.'_audio', true);
$embedded = get_post_meta($post->ID, $sr_prefix.'_audio_embedded', true);
$mp3 = get_post_meta($post->ID, $sr_prefix.'_audio_mp3', true);
$oga = get_post_meta($post->ID, $sr_prefix.'_audio_oga', true);
$image = get_post_meta($post->ID, $sr_prefix.'_audio_image', true);
$position = get_post_meta($post->ID, $sr_prefix.'_audio_position', true);
$poster = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$postid = $post->ID;

if( $audio == 'embedded' && ($embedded !== '' || !empty($embedded)) ) {
?>	

 	<div class="blog-media">
		<?php echo $embedded; ?>
	</div> <!-- END .entry-media -->
   
<?php	
} else if ($audio == 'selfhosted' && (!empty($mp3) || !empty($oga))) {
	
    ?>
    	        
        <div class="blog-media" <?php if ($position == 'pagetitle') { echo 'style="width:500px;"'; } ?>>
        
        	<?php if(has_post_thumbnail() && $image == 'true') { ?>
				<?php the_post_thumbnail('thumb-ultra'); ?>
            <?php } ?>
            
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    if(jQuery().jPlayer) {
                        jQuery("#jquery_jplayer<?php echo esc_js($postid); ?>").jPlayer({
                            ready: function () {
                                jQuery(this).jPlayer("setMedia", {
                                    <?php if($poster != '') : ?>
                                    poster: "<?php echo esc_js($poster); ?>",
                                    <?php endif; ?>
									<?php if($mp3 != '') : ?>
                                    mp3: "<?php echo esc_js($mp3); ?>",
                                    <?php endif; ?>
                                    <?php if($oga != '') : ?>
                                    oga: "<?php echo esc_js($oga); ?>",
                                    <?php endif; ?>
                                    end: ""
                                });
                            },
                            swfPath: "<?php echo get_template_directory_uri(); ?>/files/jplayer",
                            cssSelectorAncestor: "#jp_interface<?php echo esc_js($postid); ?>",
                            supplied: "<?php if($oga != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
                        });
                    
                    }
                });
            </script>
        
            <div id="jquery_jplayer<?php echo esc_attr($postid); ?>" class="jp-jplayer jp-jplayer-audio"></div>

            <div class="jp-audio-container">
                <div class="jp-audio">
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