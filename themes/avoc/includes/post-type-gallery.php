<?php

global $sr_prefix;

$gallery = get_post_meta($post->ID, $sr_prefix.'_medias', true);
$postid = $post->ID;

if( empty($gallery)) {
	
} else {	

$medias = explode('|||', $gallery);

$output_medias = '';
foreach ($medias as $media) {
	$object = explode('~~', $media);
	$type = $object[0];
	$val = $object[1];
	
	if(get_post_meta($post->ID, $sr_prefix.'_mediaslayout', true) !== "list" ) {
	$output_medias .= '<div>'; 
	} else {
	$output_medias .= '<li>'; 
	}
	
	if ($type == 'image') { 
		$image = wp_get_attachment_image_src($val, 'slider-pic'); $image = $image[0];
		$thisimage = '<img src="'.$image.'" alt="'.get_the_title($image[1]).'"/>';
			$output_medias .= $thisimage;
	} else {
		$output_medias .= $val;
	}
	
	if(get_post_meta($post->ID, $sr_prefix.'_mediaslayout', true) !== "list" ) {
	$output_medias .= '</div>';
	} else {
	$output_medias .= '</li>'; 
	}
}

?>
    <?php if(get_post_meta($post->ID, $sr_prefix.'_mediaslayout', true) !== "list" ) {  ?>
    <div class="blog-media">
        <div class="owl-slider">        
        	<?php echo $output_medias; ?>                
        </div>
    </div> <!-- END .entry-media -->
    <?php } else { ?>
    <div class="blog-media">
		<ul class="media-list">
			<?php echo $output_medias; ?>                
		</ul>
	</div> <!-- END .entry-media -->
    <?php } ?>
        
<?php } ?>