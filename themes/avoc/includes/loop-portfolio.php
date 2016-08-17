<?php 
/*-----------------------------------------------------------------------------------

	PORTFOLIO LOOP
	
-----------------------------------------------------------------------------------*/

global $sr_prefix;
global $gridType;
global $captionposition;
global $hover;

// GET CATEGORIES
$categories = wp_get_object_terms($post->ID, 'portfolio_category'); 
$current_cats = '';
$masonry_cats = '';
$private = false;
foreach($categories as $cat){
	$category = $cat->slug; 
	$current_cats .= $cat->name.', ';
	$category = strtolower($category);
	if ($category == 'private') { $private = true; }
	$replace = array(" ", "'", '"', "&amp;",  "amp;", "&");
	$category = str_replace($replace, "", $category);
	$masonry_cats .= $category.' ';
}
$current_cats = substr($current_cats, 0, -2);

// OPEN OPTION
$goto = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogoto', true);
$wConnect = '';					// wolf-connect is if lightbox on to prevend link is opening twice because of 2 anchor tags
$lightboxOption = '';
$permalink = get_the_permalink();
if ($goto == 'custom') {
	$url = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotourl', true);
	$target = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogototarget', true);
	if ($url) {
		$lightboxOption = 'target="'.$target.'"';
		$permalink = $url;
	}
} else if ($goto == 'image') {
	$image = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotoimage', true);
	if ($image) {
		$lightboxOption = 'data-rel="lightcase';
		if (get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotoconnect', true) == 'true') { $lightboxOption .= ':portfoliocollection'; }
		$lightboxOption .= '"';
		$permalink = $image;
		$wConnect = 'wolf-connect ';
	}
} else if ($goto == 'video') {
	$video = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotovideo', true);
	if ($video) {
		$lightboxOption = 'data-rel="lightcase';
		if (get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotoconnect', true) == 'true') { $lightboxOption .= ':portfoliocollection'; }
		$lightboxOption .= '"';
		$permalink = $video;
		$wConnect = 'wolf-connect ';
	}
} else if ($goto == 'selfhosted') {
	$selfhosted = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotoselfhosted', true);
	if ($selfhosted) {
		$lightboxOption = 'data-rel="lightcase';
		if (get_post_meta(get_the_ID(), $sr_prefix.'_portfoliogotoconnect', true) == 'true') { $lightboxOption .= ':portfoliocollection'; }
		$lightboxOption .= '"';
		$permalink = $selfhosted;
		$wConnect = 'wolf-connect ';
	}
} 
?>

					
                    <?php if ($gridType == 'wolf') { 
					
						$theTitle = get_post_meta(get_the_ID(), $sr_prefix.'_altcaption', true); if (!$theTitle || $theTitle == '') { $theTitle = get_the_title();}
						$speed = get_post_meta(get_the_ID(), $sr_prefix.'_wolfspeed', true);
						$showCategory = get_option($sr_prefix.'_portfoliogridcategory');
						
						$captionstyling = get_post_meta(get_the_ID(), $sr_prefix.'_captionstyling', true);
						$captionborder = get_post_meta(get_the_ID(), $sr_prefix.'_captionborder', true);
						$captionbackground = get_post_meta(get_the_ID(), $sr_prefix.'_captionbackground', true);
						$captiontext = get_post_meta(get_the_ID(), $sr_prefix.'_captiontext', true);
						
						$captionStyle = '';
						$textSyle = '';
						if ($captionstyling == 'true') {
							$captionStyle .= 'style="';
							if ($captionborder) { $captionStyle .= 'border:8px solid '.$captionborder.'; padding: 15px;';  }
							if ($captionbackground) { $captionStyle .= 'background: '.$captionbackground.'; padding: 20px;';  }
							$captionStyle .= '"';
							
							if ($captiontext) { $textSyle = 'style="color: '.$captiontext.';"';  }
						}
						
	
						$offset = get_post_meta(get_the_ID(), $sr_prefix.'_captionoffset', true);
						$hOffset = get_post_meta(get_the_ID(), $sr_prefix.'_captionhorizontaloffset', true);
						$vOffset = get_post_meta(get_the_ID(), $sr_prefix.'_captionverticaloffset', true);
												
						$captionOffset = '';
						if ($offset == 'true') {
							$captionOffset .= 'style="';
							if ($hOffset) { $captionOffset .= 'margin-right: '.esc_attr($hOffset).'%;';  }
							if ($vOffset) { $captionOffset .= 'margin-top: '.esc_attr($vOffset).'%;';  }
							$captionOffset .= '"';
						}
						
						$itemSize = get_post_meta(get_the_ID(), $sr_prefix.'_wolfitemsize', true);
						$imgPosition = get_post_meta(get_the_ID(), $sr_prefix.'_wolfimageposition', true);
												
						$itemClass = '';
						if ($itemSize == 'wfull') {
							$itemClass .= $itemSize.' '.$imgPosition;
						}
						
						$imgClass = '';
						if ($hover !== 'default') { $imgClass = 'img-hover hover-'.$hover; }
						
						$textHover = '';
						if ($hover !== 'default' && !$captionborder && !$captionbackground && !$captiontext) { $textHover = 'caption-hover'; }
						
						$cSize = get_option($sr_prefix.'_portfoliowolfcaptionsize');
						$cIndiSize = get_post_meta(get_the_ID(), $sr_prefix.'_captionsize', true);
						if ($cIndiSize && $cIndiSize !== '' && $cIndiSize !== 'general') { $cSize = $cIndiSize; }
						if (!$cSize) { $cSize = 'h4'; }
-						$topen = '<'.$cSize.' class="portfolio-name" '.$textSyle.'>';
						$tclose = '</'.$cSize.'>';
					
					?>
                    
                    <div id="item<?php echo get_the_ID(); ?>" class="wolf-item portfolio-wolf-item <?php echo esc_attr($itemClass); ?> <?php echo esc_attr($masonry_cats); ?>" <?php if ($speed) { echo 'data-speed="'.$speed.'"'; } ?>>
                        <div class="wolf-item-inner">
                            <div class="wolf-media <?php if ($hover == 'default') { ?>portfolio-media<?php } ?>">
                                <a href="<?php echo esc_url($permalink); ?>" class="wolf-media-link <?php echo esc_attr($imgClass); ?>" <?php echo $lightboxOption; ?>><?php the_post_thumbnail('thumb-big'); ?></a>
                            </div>
                            
                            <div class="wolf-caption <?php if ($hover == 'default') { ?>portfolio-caption<?php } ?> <?php echo esc_attr($captionposition); ?>" <?php echo $captionOffset; ?>>
                               	<a href="<?php echo esc_url($permalink); ?>" class="wolf-caption-link <?php echo esc_attr($wConnect); ?><?php echo esc_attr($textHover); ?>" <?php echo $captionStyle; ?>>
                                <?php if (!$showCategory) { ?>
                                <h6 class="alttitle portfolio-category" <?php echo $textSyle; ?>><?php echo esc_html($current_cats); ?></h6><?php } ?>
                                <?php echo $topen; ?><strong><?php echo $theTitle; ?></strong><?php echo $tclose; ?>
                                <?php if (post_password_required()) { ?>
                                    <h6 class="alttitle post-protected" <?php echo $textSyle; ?>><?php _e("Password Protected", 'sr_avoc_theme')?></h6>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php } else if ($gridType == 'masonry' || $gridType == 'classic') { 
						$size = get_option($sr_prefix.'_portfoliothumbsize');
						$showCategory = get_option($sr_prefix.'_portfoliogridcategory');
						
						$postThumbnail = get_the_post_thumbnail(get_the_ID(),'thumb-big');
						if ($size == '300' || $size == '420') { $postThumbnail = get_the_post_thumbnail(get_the_ID(),'thumb-medium'); }
						if ($gridType == 'classic') {
							$postThumbnail = get_the_post_thumbnail(get_the_ID(),'thumb-big-crop');
							if ($size == '300' || $size == '420') { $postThumbnail = get_the_post_thumbnail(get_the_ID(),'thumb-medium-crop'); }
						}
					?>
                    <div id="item<?php echo get_the_ID(); ?>" class="portfolio-masonry-entry masonry-item <?php echo esc_attr($masonry_cats); ?>">
                        <a href="<?php echo esc_url($permalink); ?>" class="img-hover <?php if($hover == 'dark') { echo 'hover-dark text-light';} ?>" <?php echo $lightboxOption; ?>>
                            <?php echo $postThumbnail; ?>
                            <div class="hover-caption">
                                <?php if (!$showCategory) { ?><h6 class="alttitle"><?php echo $current_cats; ?></h6><?php } ?>
                                <?php if (post_password_required()) { echo '<div class="post-protected">'.__("Password Protected", 'sr_avoc_theme').'</div>'; }?>
                                <h5><strong><?php the_title(); ?></strong></h5>
                            </div>
                        </a>
                    </div> <!-- END .portfolio-masonry-entry-->
                    <?php } ?>