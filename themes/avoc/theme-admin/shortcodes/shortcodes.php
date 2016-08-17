<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Columns
/*-----------------------------------------------------------------------------------*/

function sr_columnsection( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'wrapper' => 'wrapper'
      ), $atts ) );
	
	$return = '<div class="'.esc_attr($wrapper).'">';	
   	$return .= '<div class="column-section clearfix">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
	$return .= '</div>';	
	
	return $return;
}
add_shortcode('columnsection', 'sr_columnsection');


function sr_col( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'size' => 'one-full',
      'last' => '',
      'animation' => 'false'
      ), $atts ) );
	  
	$hasAnim = '';
	$delay = '';
	if ($animation !== 'false' && $animation !== '') { $hasAnim = 'has-animation'; $delay = 'data-delay="'.esc_attr($animation).'"'; }  
	
   	return '<div class="column '.esc_attr($size).' '.esc_attr($last).' '.esc_attr($hasAnim).'" '.$delay.'>' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
	
}
add_shortcode('col', 'sr_col');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Team
/*-----------------------------------------------------------------------------------*/
function sr_teammember( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'image' => '',
      'offset' => '',
      'name' => 'MemberName',
	  'title' => 'MemberTitle',
	  'facebook' => '',
	  'behance' => '',
	  'dribbble' => '',
	  'twitter' => '',
	  'google' => '',
	  'instagram' => '',
	  'tumblr' => '',
	  'linkedin' => '',
	  'vk' => '',
	  'soundcloud' => '',
	  'website' => '',
	  'mail' => ''
      ), $atts ) );
   
   	$output = '<div class="team-member">';
		if ($image) { $output .= '<div class="team-pic"><img src="'.esc_url($image).'" alt="'.esc_attr($name).'"></div>'; }
		
		if ($name || $title || $content) {  
			$output .= '<div class="team-info '.esc_attr($offset).'">';
			
			if ($name) { $output .= '<h4><strong>'.$name.'</strong></h4>'; }
			if ($title) { $output .= '<h6 class="alttitle">'.$title.'</h6>'; }
			
			if ($facebook || $behance || $dribbble || $twitter || $google || $linkedin || $vk || $website || $soundcloud || $mail) { 
				$output .= '<ul class="socialmedia-widget">';
				if ($facebook) { $output .= '<li class="facebook"><a href="'.esc_url($facebook).'" target="_blank"></a></li>';  }
				if ($twitter) { $output .= '<li class="twitter"><a href="'.esc_url($twitter).'" target="_blank"></a></li>';  }
				if ($google) { $output .= '<li class="googleplus"><a href="'.esc_url($google).'" target="_blank"></a></li>';  }
				if ($behance) { $output .= '<li class="behance"><a href="'.esc_url($behance).'" target="_blank"></a></li>';  }
				if ($dribbble) { $output .= '<li class="dribbble"><a href="'.esc_url($dribbble).'" target="_blank"></a></li>';  }
				if ($instagram) { $output .= '<li class="instagram"><a href="'.esc_url($instagram).'" target="_blank"></a></li>';  }
				if ($tumblr) { $output .= '<li class="tumblr"><a href="'.esc_url($tumblr).'" target="_blank"></a></li>';  }
				if ($linkedin) { $output .= '<li class="linkedin"><a href="'.esc_url($linkedin).'" target="_blank"></a></li>';  }
				if ($vk) { $output .= '<li class="vk"><a href="'.esc_url($vk).'" target="_blank"></a></li>';  }
				if ($website) { $output .= '<li class="website"><a href="'.esc_url($website).'" target="_blank"></a></li>';  }
				if ($soundcloud) { $output .= '<li class="soundcloud"><a href="'.esc_url($soundcloud).'" target="_blank"></a></li>';  }
				if ($mail) { $output .= '<li class="mail"><a href="mailto:'.$mail.'" target="_blank"></a></li>';  }
				$output .= '</ul>';
			}
			
			if ($content) { $output .= preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));  }
			
			$output .= '</div>';
		}
		
	$output .= '</div>'; 
	
	return $output;
}
add_shortcode('sr-teammember', 'sr_teammember');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Buttons
/*-----------------------------------------------------------------------------------*/
function sr_button( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => 'sr-button1',
      'size' => 'medium-button',
	  'url' => '',
      'target' => '_self',
	  'page' => '',
	  'portfolio' => '',
	  'image' => '',
	  'video' => '',
	  'selfhosted' => ''
      ), $atts ) );
	
		
	if ($url && $target) { 
		return '<a href="'.esc_url($url).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).'"  target="'.esc_attr($target).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</a>';	
	} 
	
	if ($page && $page !== 'false') { 
		return '<a href="'.esc_url( get_permalink($page) ).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).' scroll-to" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)). '</a>';	
	}
	
	if ($portfolio && $portfolio !== 'false') { 
		return '<a href="'.esc_url( get_permalink($portfolio) ).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).' scroll-to" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)). '</a>';	
	} 
	
	if ($image && $image !== 'false') { 
		return '<a href="'.esc_url($image).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).'" data-rel="lightcase" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</a>';	
	} 
	
	if ($video && $video !== 'false') { 
		return '<a href="'.esc_url($video).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).'" data-rel="lightcase" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</a>';	
	}
	
	if ($selfhosted && $selfhosted !== 'false') { 
		return '<a href="'.esc_url($selfhosted).'" class="sr-button '.esc_attr($color).' '.esc_attr($size).'" data-rel="lightcase" >'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</a>';	
	} 
		
	
}
add_shortcode('button', 'sr_button');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Icons
/*-----------------------------------------------------------------------------------*/
function sr_iconfont( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => '',
      'size' => 'normal',
      'color' => ''
      ), $atts ) );
	
	$iconcolor = '';
	if ($color && $color !== '') { 
		$iconcolor = 'style="color:'.esc_attr($color).';"';
	}
	
	if ($type[0] == 'i') { 
		return '<i class="ion '.esc_attr($type).' ion-'.esc_attr($size).'" '.$iconcolor.'></i>';	
	}  else {
		return '<i class="fa '.esc_attr($type).' fa-'.esc_attr($size).'" '.$iconcolor.'></i>';	
	}
		
}
add_shortcode('iconfont', 'sr_iconfont');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Counter
/*-----------------------------------------------------------------------------------*/
function sr_counter( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'from' => '0',
      'to' => '1000',
      'speed' => '7',
      'sub' => 'Counter Name'
      ), $atts ) );
	
	
	
		
	return '<div class="counter align-center">
				<div class="counter-value" data-from="'.esc_attr($from).'" data-to="'.esc_attr($to).'" data-speed="'.esc_attr($speed).'">'.esc_html($from).'</div>
				<h6 class="counter-name alttitle title-minimal"><strong>'.esc_html($sub).'</strong></h6>
			</div>
			';	
}
add_shortcode('counter', 'sr_counter');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Toggles
/*-----------------------------------------------------------------------------------*/
function sr_toggle( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => 'Toggle',
      'open' => 'no'
      ), $atts ) );
			
	if ($open == 'yes') { $toggleopen = 'toggle-active'; } else { $toggleopen = ''; }
	
	return '<div class="toggle-item">
				<div class="toggle-title '.esc_attr($toggleopen).'">
					<h5 class="alttitle toggle-name">' . esc_html($title) . '</h5>
				</div>
				<div class="toggle-inner">'.do_shortcode($content).'</div>
			</div>';
}
add_shortcode('toggle', 'sr_toggle');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Skills
/*-----------------------------------------------------------------------------------*/
function sr_skill( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'amount' => '55',
	  'name' => 'Skillname',
	  'color' => '#0d0d0d'
      ), $atts ) );
	
	$skill_slug = preg_replace('/[^a-z]/', "", strtolower($name));
	
	if ($color) { $skillcolor = 'background:'.esc_attr($color); } else { $skillcolor = '';  }
		
	return '<div class="skill">
				<h6 class="skill-name alttitle">'.esc_html($name).'</h6>
				<div class="skill-bar"><div class="skill-active '.esc_attr($skill_slug).'" style="'.$skillcolor.'" data-perc="'.esc_attr($amount).'">
				<span class="tooltip">'.esc_html($amount).'%</span></div></div>
			</div>';	
}
add_shortcode('skill', 'sr_skill');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Tabs
/*-----------------------------------------------------------------------------------*/
function sr_tabs( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => ''
      ), $atts ) );
	
	$return = '<div class="tabs"><ul class="tab-nav clearfix">';
	
	$title = substr($title, 0, -1);
	$title = explode(',', $title);
	$i = 1;
	foreach ($title as $t) {
		if ($i == 1) { $addclass = 'class="active"'; } else { $addclass = ''; }
		$return .= '<li><h5 class="alttitle tab-name"><a href="tabid'.esc_attr($i).'" '.$addclass.'>'.esc_html($t).'</a></h5></li>';	
		$i++;
	}
	
	$return .= '</ul><div class="clear"></div><div class="tab-container">'.do_shortcode($content).'</div></div>';
	
	return $return;	
}
add_shortcode('tabs', 'sr_tabs');


function sr_tab( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'id' => ''
      ), $atts ) );
	
	if ($id == 1) { $addclass = 'active'; } else { $addclass = ''; }
	return '<div class="tab-content tabid'.esc_attr($id).' '.esc_attr($addclass).'">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('tab', 'sr_tab');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Accordion
/*-----------------------------------------------------------------------------------*/
function sr_accordion( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => 'Toggle',
      'open' => 'no'
      ), $atts ) );
			
	if ($open == 'yes') { $toggleopen = 'toggle-active'; } else { $toggleopen = ''; }
	
	return '	<div class="toggle-item">
				<div class="toggle-title '.esc_attr($toggleopen).'">
					<h5 class="alttitle toggle-name">' . esc_html($title) . '</h5>
				</div>
				<div class="toggle-inner">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>
			</div>';		
}
add_shortcode('accordion', 'sr_accordion');


function sr_accordiongroup( $atts, $content = null )
{	
	return '<div class="accordion">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('accordiongroup', 'sr_accordiongroup');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Contact form
/*-----------------------------------------------------------------------------------*/
function sr_field( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => 'textfield',
	  'name' => 'Fieldname',
	  'slug' => 'slugname',
	  'required' => 'yes'
      ), $atts ) );
		
	
	if ($required == 'yes') { $label_req = 'class="req"'; $req = "*"; } else { $label_req = ''; $req = ""; }
	$input_name = strtolower($slug);
	
	
	$output = '';
	if ($type == 'textfield') {
		$output .= '<div class="form-row clearfix">
						<label for="'.esc_attr($input_name).'" '.$label_req.'>'.esc_html($name).' '.$req.'</label>
						<input type="text" name="'.esc_attr($input_name).'" class="'.esc_attr($input_name).'" id="'.esc_attr($input_name).'" value="" placeholder="'.esc_html($name).'" />
					</div>
					';
	} else if ($type == 'textarea') {
		$output .= '<div class="form-row clearfix textbox">
						<label for="'.esc_attr($input_name).'" '.$label_req.'>'.esc_html($name).' '.$req.'</label>
						<textarea name="'.esc_attr($input_name).'" class="'.esc_attr($input_name).'" id="'.esc_attr($input_name).'" rows="15" cols="50" placeholder="'.esc_html($name).'"></textarea>
					</div>
					';
	} 
	
	
	return $output;
	
}
add_shortcode('field', 'sr_field');

function sr_contactgroup( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
      'fields' => '',
      'email' => 'Testemail',
      'subject' => 'Subject',
      'submit' => 'Send'
      ), $atts ) );
	
	if ($fields == '') { 
		return '<p><span class="error_message">Please check your Contact form. Your shortcode [contactgroup] needs a "fields" attribute</span></p>';
	} else {
   		return '<form id="contact-form" class="checkform" action="'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"].'" target="'.get_template_directory_uri().'/contact-form.php" method="post" >' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '
		<div id="form-note">
			<div class="alert alert-error">
				<strong>'.__("Error", 'sr_avoc_theme').'</strong>: '.__("Please check your entries", 'sr_avoc_theme').'!
			</div>
		</div>
		<div class="form-row form-submit"><input type="submit" name="submit_form" class="submit" value="'.esc_html($submit).'" /></div>
		<input type="hidden" name="subject" value="'.$subject.'" />
		<input type="hidden" name="fields" value="'.$fields.'" />
		<input type="hidden" name="sendto" value="'.$email.'" />
		</form>';
	}
}
add_shortcode('contactgroup', 'sr_contactgroup');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for SR SLIDER
/*-----------------------------------------------------------------------------------*/
function sr_slider( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'images' => '',
      'autoplay' => 'false',
      'loop' => 'true',
      'nav' => 'true',
      'dots' => 'false'
      ), $atts ) );
	
	global $sr_prefix;
	
	
	$return = '<div class="owl-slider" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-nav="'.esc_attr($nav).'" data-dots="'.esc_attr($dots).'">';
	
	$slides = explode('|||', $images);
	foreach ($slides as $i) { 
		$object = explode('~~', $i); 
		$type = $object[0];
		$imageId = $object[1];
		$image = wp_get_attachment_image_src($imageId,'full'); $image = $image[0];
		
		$return .= '<div>'.wp_get_attachment_image( $imageId, 'full' ).'</div>';
	}
	
	$return .= '</div>';
	
	return $return;
	
}
add_shortcode('sr-slider', 'sr_slider');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for SR GALLERY
/*-----------------------------------------------------------------------------------*/
function sr_gallery( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'images' => '',
      'type' => 'gallery',
      'columns' => '3',
      'animation' => 'false',
      'tilesize' => '420',
      'crop' => 'false',
      'spaced' => 'yes',
      'lightbox' => 'no'
      ), $atts ) );
	
	global $sr_prefix;
	
	$slides = explode('|||', $images);
	if ($spaced == 'yes') { $addClass = 'spaced'; } else { $addClass = ''; }
	
	if ($type == 'gallery') {
		$return = '<ul class="sr-gallery gallery-col'.esc_attr($columns).' '.esc_attr($addClass).'">';
		$co = 0;
		foreach ($slides as $i) { 
			$object = explode('~~', $i); 
			$type = $object[0];
			$imageId = $object[1];
			
			$imageLink = wp_get_attachment_image_src($imageId,'full'); 
			$imageLink = $imageLink[0];
			
			// animation
			$liClass = '';
			if ($animation == 'normal') {
				$liClass = ' class="has-animation"';	
			} else if ($animation == 'delayed') {
				if ($co+1 % $columns == 0) { $co = 0; } 
				$liClass = ' class="has-animation" data-delay="'.($co*200).'"';	
			}
			
			$return .= '<li'.$liClass.'>';
			if ($lightbox == 'yes') { $return .= '<a href="'.esc_url($imageLink).'" data-rel="lightcase:myCollection" class="img-hover">'; }
			if ($columns == '3' || $columns == '4') { $return .= wp_get_attachment_image($imageId,'thumb-big-crop'); } 
			else if ($columns == '5' || $columns == '6') { $return .= wp_get_attachment_image($imageId,'thumb-medium-crop'); }
			else { $return .= wp_get_attachment_image($imageId,'full'); }
			if ($lightbox == 'yes') { $return .= '</a>'; }
			$return .= '</li>';
			$co++;
		}
		$return .= '</ul>';
	} else if ($type == 'masonry') { 
		
		$return = '<div class="masonry gallery-masonry spacing-'.esc_attr($spaced).' clearfix" data-maxitemwidth="'.esc_attr($tilesize).'">';
		
		$co = 0;
		foreach ($slides as $i) { 
			$object = explode('~~', $i); 
			$type = $object[0];
			$imageId = $object[1];
			
			$imageLink = wp_get_attachment_image_src($imageId,'full'); 
			$imageLink = $imageLink[0];
			
			$return .= '<div class="gallery-masonry-entry masonry-item">';
			if ($lightbox == 'yes') { $return .= '<a href="'.esc_url($imageLink).'" data-rel="lightcase:myCollection" class="img-hover">'; }
			if ($tilesize == '300' || $tilesize == '420') { 
				if ($crop == 'true') { $return .= wp_get_attachment_image($imageId,'thumb-medium-crop'); }
				else { $return .= wp_get_attachment_image($imageId,'thumb-medium'); }
			} 
			else { 
				if ($crop == 'true') { $return .= wp_get_attachment_image($imageId,'thumb-big-crop'); }
				else { $return .= wp_get_attachment_image($imageId,'thumb-big'); }
			}
			if ($lightbox == 'yes') { $return .= '</a>'; }
			$return .= '</div>';
		}
		
		$return .= '</div>';
	}
				
	return $return;
	
}
add_shortcode('sr-gallery', 'sr_gallery');






/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Google Map
/*-----------------------------------------------------------------------------------*/
function sr_googlemap_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'latlong' => '-33.86938,151.204834',
      'apikey' => '',
      'pinicon' => get_template_directory_uri().'/files/images/map-pin.png',
      'height' => '400',
      'style' => 'default'
      ), $atts ) );
	
	$text = preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));
	
	if ($height) { $mapStyle= 'height:'.esc_attr($height).'px;'; } else { $mapStyle = 'height:400px;'; }
	return sr_googleMap($latlong, $text, $pinicon, $mapStyle, '', '', $style, $apikey);
		
}
add_shortcode('sr-googlemap', 'sr_googlemap_shortcode');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Subtitle
/*-----------------------------------------------------------------------------------*/
function sr_title( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'size' => 'h4',
      'alignment' => 'center'
      ), $atts ) );	
	  
	  
	$return =   '<'.$size.' class="alttitle align-'.esc_attr($alignment).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</'.$size.'>';
	return $return;	
}
add_shortcode('sr-subtitle', 'sr_title');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Horizontal Section
/*-----------------------------------------------------------------------------------*/
function sr_horizontalsection( $atts, $content = null )
{		
	extract( shortcode_atts( array(
      'background' => '',
      'textcolor' => 'text-light',
      'pdtop' => '120',
      'pdbottom' => '120',
      'fullheight' => 'false',
	  
      'colorbg' => '',
	  
	  'imagebg' => '',
      'imageparallax' => 'true',
	  
	  'videomp4' => '',
      'videowebm' => '',
      'videoogv' => '',
      'videowidth' => '',
      'videoheight' => '',
      'videoposter' => '',
      'videoparallax' => 'false',
      'videooverlay' => '',
      'videooverlayopacity' => '5'
      ), $atts ) );
		
	$styleInner = 'padding-top:'.esc_attr($pdtop).'px;';
	$styleInner .= 'padding-bottom:'.esc_attr($pdbottom).'px;';
	$classMain = $textcolor;
	if ($fullheight == 'true') { $classMain .= ' fullheight';  }
	
	$return = '';
	if ($background == 'color') {
		$styleMain = 'background:'.esc_attr($colorbg).';';
		$return .= '
			<div class="horizontal-section '.esc_attr($classMain).'" style="'.$styleMain.'">
				<div class="horizontal-inner" style="'.$styleInner.'">
				'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
				</div>
			</div>
		';	
	} else if ($background == 'image') {
		if ($imageparallax == 'true') { $classMain.= ' parallax-section'; $dataMain = 'data-parallax-image="'.esc_attr($imagebg).'"'; $styleMain = ''; }
		else { $styleMain= 'background:url('.esc_url($imagebg).') center center; background-size:cover;'; $dataMain = ''; }
		$return .= '
			<div class="horizontal-section '.esc_attr($classMain).'" style="'.$styleMain.'" '.$dataMain.'>
				<div class="horizontal-inner" style="'.$styleInner.'">
				'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
				</div>
			</div>
		';	
	} else if ($background == 'video') {
		$classMain.= ' videobg-section'; $dataMain = 'data-videomp4="'.esc_attr($videomp4).'" data-videowebm="'.esc_attr($videowebm).'" data-videooga="'.esc_attr($videoogv).'" data-videowidth="'.esc_attr($videowidth).'" data-videoheight="'.esc_attr($videoheight).'" data-videoposter="'.esc_attr($videoposter).'" data-videoparallax="'.esc_attr($videoparallax).'" data-videooverlaycolor="'.esc_attr($videooverlay).'" data-videooverlayopacity="0.'.esc_attr($videooverlayopacity).'"'; 
		$return .= '
			<div class="horizontal-section '.esc_attr($classMain).'" '.$dataMain.'>
				<div class="horizontal-inner" style="'.$styleInner.'">
				'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
				</div>
			</div>
		';	
	}
	return $return;
	
}
add_shortcode('horizontalsection', 'sr_horizontalsection');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Selfhosted Audio
/*-----------------------------------------------------------------------------------*/
function sr_selfhostedtaudio( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'mp3' => '',
      'oga' => '',
      'pic' => '',
      'id' => '0'
      ), $atts ) );
	
	$picid = sr_get_attachment_id_from_src($pic);
	$picimage = wp_get_attachment_image($picid, 'full');
	
	return $picimage.''.sr_selfaudio($mp3, $oga, $pic, $id);
	
}
add_shortcode('selfhostedtaudio', 'sr_selfhostedtaudio');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Selfhosted Video
/*-----------------------------------------------------------------------------------*/
function sr_selfhostedtvideo( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'm4v' => '',
      'oga' => '',
      'webmv' => '',
      'pic' => '',
      'id' => '0'
      ), $atts ) );
	
	return sr_selfvideo($m4v, $oga, $webmv, $pic, $id);
	
}
add_shortcode('selfhostedtvideo', 'sr_selfhostedtvideo');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Selfhosted Video
/*-----------------------------------------------------------------------------------*/
function sr_social( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'fb' => '',
      'tw' => '',
      'be' => '',
      'dr' => '',
      'google' => '',
      'inst' => '',
      'tum' => '',
      'linked' => '',
      'vk' => '',
      'sc' => '',
      'web' => '',
      'mail' => '',
      'alignment' => 'left'
      ), $atts ) );
	
	$return = '<ul class="socialmedia-widget align-'.$alignment.'" >';	
		if ($fb) { $return .= '<li class="facebook"><a href="'.esc_url($fb).'" target="_blank"></a></li>'; }
		if ($tw) { $return .= '<li class="twitter"><a href="'.esc_url($tw).'" target="_blank"></a></li>'; }
		if ($be) { $return .= '<li class="behance"><a href="'.esc_url($be).'" target="_blank"></a></li>'; }
		if ($dr) { $return .= '<li class="dribbble"><a href="'.esc_url($dr).'" target="_blank"></a></li>'; }
		if ($google) { $return .= '<li class="googleplus"><a href="'.esc_url($google).'" target="_blank"></a></li>'; }
		if ($inst) { $return .= '<li class="instagram"><a href="'.esc_url($inst).'" target="_blank"></a></li>'; }
		if ($tum) { $return .= '<li class="tumblr"><a href="'.esc_url($tum).'" target="_blank"></a></li>'; }
		if ($linked) { $return .= '<li class="linkedin"><a href="'.esc_url($linked).'" target="_blank"></a></li>'; }
		if ($vk) { $return .= '<li class="vk"><a href="'.esc_url($vk).'" target="_blank"></a></li>'; }
		if ($sc) { $return .= '<li class="soundcloud"><a href="'.esc_url($sc).'" target="_blank"></a></li>'; }
		if ($web) { $return .= '<li class="linkedin"><a href="'.esc_url($web).'" target="_blank"></a></li>'; }
		if ($mail) { $return .= '<li class="mail"><a href="mailto:'.esc_url($mail).'" target="_blank"></a></li>'; }
	$return .= '</ul>';	
	
	return $return;
	
}
add_shortcode('sr-social', 'sr_social');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Inline Video
/*-----------------------------------------------------------------------------------*/
function sr_video( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => '',
      'image' => '',
      'video' => '',
      'id' => '',
      'text' => ''
      ), $atts ) );
	
	if ($type == 'inline') {
		return '<div class="inline-video" data-type="'.esc_attr($video).'" data-videoid="'.esc_attr($id).'" data-button="'.esc_attr($text).'">
					<img src="'.esc_url($image).'">
				</div>';	
	}
	
}
add_shortcode('sr-video', 'sr_video');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Spacer
/*-----------------------------------------------------------------------------------*/
function sr_spacer( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'size' => 'big'
      ), $atts ) );
	
	return '<div class="spacer spacer-'.esc_attr($size).'"></div>';
	
}
add_shortcode('spacer', 'sr_spacer');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Wolf Section
/*-----------------------------------------------------------------------------------*/
function sr_wolf( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'wrapper' => 'wrapper',
	  'parallax' => 'true',
	  'captionparallax' => 'true',
	  'randomhorizontaloffset' => 'false',
	  'mouseparallax' => 'false'
      ), $atts ) );
	
	$return = '<div class="'.esc_attr($wrapper).'">';	
	$return .= '<div class="wolf-grid clearfix" data-parallax="'.esc_attr($parallax).'" data-captionparallax="'.esc_attr($captionparallax).'" data-randomhorizontaloffset="'.esc_attr($randomhorizontaloffset).'" data-mouseparallax="'.esc_attr($mouseparallax).'">
			'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
			</div>';
	$return .= '</div>';
			
	return $return;		
	
}
add_shortcode('wolf', 'sr_wolf');


/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Wolf Section
/*-----------------------------------------------------------------------------------*/
function sr_wolfitem( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'size' => 'whalf',
	  'speed' => '',
	  'image' => '',
	  'imagelink' => 'false',
	  'url' => '',
	  'target' => '_self',
	  'lightbox' => '',
	  'youtube' => 'youtube',
	  'vimeo' => 'vimeo',
	  'captionshow' => 'false',
	  'imageposition' => 'wleft',
	  'customcaptionwidth' => '',
	  'customimagewidth' => '',
	  'captionposition' => ''
      ), $atts ) );
	  
	 if ($speed) { $addSpeed = 'data-speed="'.$speed.'"'; } else { $addSpeed = ''; }
	 if ($captionshow == 'true' && $customimagewidth) { $addWidth = 'style="width: '.$customimagewidth.';"'; } else { $addWidth = ''; }
	 if ($customimagewidth || $customcaptionwidth && $size == 'wfull') { $wtext = 'wolf-text'; } else { $wtext = ''; }
		
	$return = '<div class="wolf-item '.esc_attr($wtext).' '.esc_attr($size).' '.esc_attr($imageposition).'" '.$addSpeed.'>';	
	
	$return .= '<div class="wolf-item-inner" '.$addWidth.'>';
	$return .= '<div class="wolf-media">';
	if ($imagelink !== 'false') { 
		if ($imagelink == 'url') { 
			$return .= '<a href="'.esc_url($url).'" target="'.esc_attr($target).'" class="img-hover">'; 
		} else if ($imagelink == 'lightbox') {  
			$return .= '<a href="'.esc_url($lightbox).'" data-rel="lightcase:wolfsection" class="img-hover">'; 
		} else if ($imagelink == 'youtube') { 
			$return .= '<a href="'.esc_url('http://www.youtube.com/embed/'.$youtube).'" data-rel="lightcase:wolfsection" class="img-hover">'; 
		} else if ($imagelink == 'vimeo') { 
			$return .= '<a href="'.esc_url('http://player.vimeo.com/video/'.$vimeo).'" data-rel="lightcase:wolfsection" class="img-hover">'; 
		}
	}
	$return .= '<img src="'.$image.'" alt="SEO NAME">';
	if ($imagelink !== 'false') { $return .= '</a>'; }
	$return .= '</div>';
	
	if ($content && $captionshow == 'true') {
	  	if ($captionshow == 'true' && $customcaptionwidth) { $captionWidth = 'style="width: '.$customcaptionwidth.';"'; } else { $captionWidth = ''; }
		$return .= '<div class="wolf-caption '.esc_attr($captionposition).'" '.$captionWidth.'>
						'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
					</div>';
	}
	
	$return .= '</div>';
	$return .= '</div>';
			
	if ($size !== 'null') { // some users had problems with empty/null wolfitems (see also php)
		return $return;
	}
	
}
add_shortcode('wolfitem', 'sr_wolfitem');



/*-----------------------------------------------------------------------------------*/
/*	Register Buttons
/*-----------------------------------------------------------------------------------*/
function sr_init_buttons() {
	// If user has permission
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "sr_add_buttons_plugin");
		add_filter('mce_buttons', 'sr_register_buttons');
	}
}
add_action('init', 'sr_init_buttons');

function sr_add_buttons_plugin($plugin_array) {
   $plugin_array['popupbutton'] = get_template_directory_uri() . '/theme-admin/shortcodes/tinymcepopup.js';
	return $plugin_array;
}

function sr_register_buttons($buttons) {
	array_push( $buttons, "popup" );
	return $buttons;
}



/*-----------------------------------------------------------------------------------*/
/*	Wordpress Bugfix for shortcodes (paragraph issue)
/*-----------------------------------------------------------------------------------*/
add_filter("the_content", "sr_the_content_filter");
function sr_the_content_filter($content) {
 
	// array of custom shortcodes requiring the fix
	$block = join("|",array(	"accordiongroup",
								"accordion",
								"col",
								"columnsection",
								"contactgroup",
								"counter",
								"field",
								"horizontalsection",
								"sr-teammember",
								"tabs",
								"tab",
								"sr-subtitle",
								"toggle",
								"skill",
								"sr-slider",
								"sr-social",
								"sr-gallery",
								"sr-googlemap",
								"sr-video",
								"spacer",
								"wolf"
								));
	 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
 
}


?>