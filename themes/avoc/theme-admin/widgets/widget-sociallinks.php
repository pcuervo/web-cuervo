<?php

/*-----------------------------------------------------------------------------------
	
	Plugin Name: Social Links Widget  
	Description: Show you social links  
	Version: 1.0  
	Author: SpabRice  
	Author URI: http://www.spab-rice.com  
	
-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Register Social link Widget & enqueu scripts
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'sr_sociallinks_widget' );

function sr_sociallinks_widget() {
	register_widget( 'sr_sociallinks_widget' );
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Class
/*-----------------------------------------------------------------------------------*/

class sr_sociallinks_widget extends WP_Widget {

	/*  Widget setup  */
	
	function sr_sociallinks_widget() {
	
		// Widget settings
		$widget_ops = array( 'classname' => 'sr_sociallinks_widget', 'description' => __('A widget that displays all Social links which have been activated.', 'sr_avoc_theme') );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base', 'sr-sociallinks-widget' );
		
		// Create widget
		parent::__construct( 'sr_sociallinks_widget', __('SR - Social Links','sr_avoc_theme'), $widget_ops, $control_ops );
	}
	


	/*  Display Widget */
	
	function widget( $args, $instance ) {
		extract( $args );
		
		// Get the inputs
		$sr_title = apply_filters('widget_title', $instance['title'] );
		$sr_facebook = $instance['facebook'];
		$sr_twitter = $instance['twitter'];
		$sr_googleplus = $instance['googleplus'];
		$sr_pinterest = $instance['pinterest'];
		$sr_instagram = $instance['instagram'];
		$sr_dribbble = $instance['dribbble'];
		$sr_vimeo = $instance['vimeo'];
		$sr_youtube = $instance['youtube'];
		$sr_flickr = $instance['flickr'];
		$sr_behance = $instance['behance'];
		$sr_deviantart = $instance['deviantart'];
		$sr_tumblr = $instance['tumblr'];
		$sr_linkedin = $instance['linkedin'];
		$sr_xing = $instance['xing'];
		$sr_dropbox = $instance['dropbox'];
		$sr_soundcloud = $instance['soundcloud'];
		$sr_vk = $instance['vk'];
		$sr_mail = $instance['mail'];
		$sr_rss = $instance['rss'];
		
		
		// Display the WidgetBefore settings
		echo $before_widget;
		
		// Display the title
		if ( $sr_title ) { echo $sr_title; }
		
			
		/* Display Social Buttons */
		?>
			<ul class="socialmedia-widget" >
                    <?php if($sr_facebook !== '') { echo '<li class="facebook"><a href="'.$sr_facebook.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_twitter !== '') { echo '<li class="twitter"><a href="'.$sr_twitter.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_googleplus !== '') { echo '<li class="googleplus"><a href="'.$sr_googleplus.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_pinterest !== '') { echo '<li class="pinterest"><a href="'.$sr_pinterest.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_instagram !== '') { echo '<li class="instagram"><a href="'.$sr_instagram.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_dribbble !== '') { echo '<li class="dribbble"><a href="'.$sr_dribbble.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_vimeo !== '') { echo '<li class="vimeo"><a href="'.$sr_vimeo.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_youtube !== '') { echo '<li class="youtube"><a href="'.$sr_youtube.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_flickr !== '') { echo '<li class="flickr"><a href="'.$sr_flickr.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_behance !== '') { echo '<li class="behance"><a href="'.$sr_behance.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_deviantart !== '') { echo '<li class="deviantart"><a href="'.$sr_deviantart.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_tumblr !== '') { echo '<li class="tumblr"><a href="'.$sr_tumblr.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_linkedin !== '') { echo '<li class="linkedin"><a href="'.$sr_linkedin.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_xing !== '') { echo '<li class="xing"><a href="'.$sr_xing.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_dropbox !== '') { echo '<li class="dropbox"><a href="'.$sr_dropbox.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_soundcloud !== '') { echo '<li class="soundcloud"><a href="'.$sr_soundcloud.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_vk !== '') { echo '<li class="vk"><a href="'.$sr_vk.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_mail !== '') { echo '<li class="mail"><a href="'.$sr_mail.'" target="_blank"></a></li>'; }?>
                    <?php if($sr_rss !== '') { echo '<li class="rss"><a href="'.$sr_rss.'" target="_blank"></a></li>'; }?>
             </ul>
         <?php   
		
		
		// Display the WidgetAfter settings
		echo $after_widget;
	}
	
	

	/* Update Widget */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['flickr'] = strip_tags( $new_instance['flickr'] );
		$instance['behance'] = strip_tags( $new_instance['behance'] );
		$instance['deviantart'] = strip_tags( $new_instance['deviantart'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['xing'] = strip_tags( $new_instance['xing'] );
		$instance['dropbox'] = strip_tags( $new_instance['dropbox'] );
		$instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
		$instance['vk'] = strip_tags( $new_instance['vk'] );
		$instance['mail'] = strip_tags( $new_instance['mail'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );

		return $instance;
	}
	
	
	/* Widget settings */
	
	function form( $instance ) {
		
		// Set up default settings
		$defaults = array(
			'title' => '',
			'facebook' => '',
			'twitter' => '',
			'googleplus' => '',
			'pinterest' => '',
			'instagram' => '',
			'dribbble' => '',
			'vimeo' => '',
			'youtube' => '',
			'flickr' => '',
			'behance' => '',
			'deviantart' => '',
			'tumblr' => '',
			'linkedin' => '',
			'xing' => '',
			'dropbox' => '',
			'soundcloud' => '',
			'vk' => '',
			'mail' => '',
			'rss' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		?>

		<p>
            <i><?php _e('Enter your social profile links including "http://"', 'sr_avoc_theme'); ?></i>
		</p>
        
        <!-- Title -->
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        
        
        <!-- Facebook -->
		<p>
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" />
        </p>
        
        
        <!-- Twitter -->
		<p>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" />
        </p>
        
        
        <!-- Googleplus -->
		<p>
		<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Google Plus:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" />
        </p>
        
        
        <!-- pinterest -->
		<p>
		<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" />
        </p>
        
        <!-- instagram -->
		<p>
		<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>" />
        </p>
        
        
        <!-- dribbble -->
		<p>
		<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" />
        </p>
        
        
        <!-- vimeo -->
		<p>
		<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" />
        </p>
        
        <!-- youtube -->
		<p>
		<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" />
        </p>
        
        
        <!-- behance -->
		<p>
		<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" />
        </p>
        
        
        <!-- deviantart -->
		<p>
		<label for="<?php echo $this->get_field_id( 'deviantart' ); ?>"><?php _e('Deviantart:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'deviantart' ); ?>" name="<?php echo $this->get_field_name( 'deviantart' ); ?>" value="<?php echo $instance['deviantart']; ?>" />
        </p>
        
            
        <!-- tumblr -->
		<p>
		<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" />
        </p>
        
        
        <!-- linkedin -->
		<p>
		<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('Linked In:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" />
        </p>
        
        
        <!-- xing -->
		<p>
		<label for="<?php echo $this->get_field_id( 'xing' ); ?>"><?php _e('Xing:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'xing' ); ?>" name="<?php echo $this->get_field_name( 'xing' ); ?>" value="<?php echo $instance['xing']; ?>" />
        </p>
        
        
        <!-- dropbox -->
		<p>
		<label for="<?php echo $this->get_field_id( 'dropbox' ); ?>"><?php _e('Dropbox:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dropbox' ); ?>" name="<?php echo $this->get_field_name( 'dropbox' ); ?>" value="<?php echo $instance['dropbox']; ?>" />
        </p>
        
        
        <!-- soundcloud -->
		<p>
		<label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>"><?php _e('Soundcloud:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" value="<?php echo $instance['soundcloud']; ?>" />
        </p>
        
        
        <!-- vk -->
		<p>
		<label for="<?php echo $this->get_field_id( 'vk' ); ?>"><?php _e('Vk:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'vk' ); ?>" name="<?php echo $this->get_field_name( 'vk' ); ?>" value="<?php echo $instance['vk']; ?>" />
        </p>
        
        
        <!-- mail -->
		<p>
		<label for="<?php echo $this->get_field_id( 'mail' ); ?>"><?php _e('Email:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" value="<?php echo $instance['mail']; ?>" /><em>Add "mailto:" in front</em>
        </p>
        
        
         <!-- Rss -->
		<p>
		<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('Rss:', 'sr_avoc_theme') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" />
        </p>
            
            
		
		
		
	<?php
	}
}

?>