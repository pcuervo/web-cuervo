<?php

/*-----------------------------------------------------------------------------------

	General Frontend theme features

-----------------------------------------------------------------------------------*/
global $sr_prefix;



/*-----------------------------------------------------------------------------------*/
/*	Blog Metas
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_getBlogMeta' ) ) {
	function sr_getBlogMeta() {
		global $wp_query;	
		global $sr_prefix;
		
		
		// AUTHOR AVATAR
		$metaavatar = '';
		if ( !get_option($sr_prefix.'_blogpostsdisableavatar') ) { 
			$metaavatar .= '<figure class="meta-avatar">';
			$metaavatar .= '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_avatar( get_the_author_meta('user_email'), '80', '' ).'</a>';
			$metaavatar .= '</figure>';
		}
		
		// AUTHOR NAME
		$metaauthor = '';
		if ( !get_option($sr_prefix.'_blogpostsdisableauthor') ) { 
			$metaauthor .= '<div class="meta-author"><span>'.__('written by', 'sr_avoc_theme').'</span> ';
			$metaauthor .= '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>';
			$metaauthor .= '</div>';
		}
		
		// CATEGORY
		$metacategory = '';
		if ( !get_option($sr_prefix.'_blogpostsdisablecategory')) {
			$metacategory .= '<div class="meta-category">';
			$categories = get_the_category();
			$separator = ', ';
			$catoutput = '';
			if($categories){
				$catoutput .= '<span>'.__('in category', 'sr_avoc_theme').'</span> ';
				foreach($categories as $category) {
					$catoutput .= 	'<a class="cat-link" href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'sr_avoc_theme' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
				}
				$metacategory .= trim($catoutput, $separator);
			} 
           $metacategory .= '</div>';
		}
		
		// TAGS
		$metatags = '';
		if ( !get_option($sr_prefix.'_blogpostsdisabletags')) { 
			$metatags .= '<div class="meta-tags">';
			$tags = get_the_tags();
			$tagoutput = '';
			if ($tags) {
				$tagoutput .= '<span>tags</span> ';
				foreach (get_the_tags() as $tag)
				{
					//echo "<option value=\"";
					//echo get_tag_link($tags->term_id);
					$tagoutput .= '<a class="tag-link" href="'.get_tag_link($tag->term_id).'" >'.$tag->name.'</a>'.$separator;
				}
				$metatags .= trim($tagoutput, $separator);
			}
           	$metatags .= '</div>';
		}
				
		
		if ($metaavatar || $metaauthor || $metacategory || $metatags ) {
		return $metaavatar.$metaauthor.$metacategory.$metatags;
		}
				
		
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination for pages
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_pagination' ) ) {
	function sr_pagination($type,$prevtext = 'Previous', $nexttext = 'Next' )
	{
		global $query;
				
		// No pagination on single sites
		if(!is_single())	
		{	
			if ( get_option( 'page_on_front' ) == get_the_ID() ) { $current = get_query_var('page') == 0 ? 1 : get_query_var('page'); } 
			else { $current = get_query_var('paged') == 0 ? 1 : get_query_var('paged'); }
			$total = $query->max_num_pages;																
			
			// If there are more than 1 page
			if($total > 1)	
			{				
				echo '<ul class="entries-pagination">';
				
				// Future-Button
				if ($current == 1) { $nextdisable = 'inactive'; } else { $nextdisable = '';  }
				echo '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url(get_pagenum_link($current-1)).'" title="'.esc_attr($nexttext).'" class="transistion">'.$nexttext.'</a></li>';	
				
				// Past-Button
				if ($current == $total) { $prevdisable = 'inactive'; } else { $prevdisable = '';  }
				echo '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url(get_pagenum_link($current+1)).'" title="'.esc_attr($prevtext).'" class="transistion">'.$prevtext.'</a></li>';
				
				echo '</ul> <!-- END #entries-pagination -->';
			} 
		}
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination on single item view
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_singlepagination' ) ) {
	function sr_singlepagination($type,$id,$class,$prevtext = 'Previous', $nexttext = 'Next', $backbutton = false ) {
		global $sr_prefix;
		
		$prev_item = get_adjacent_post(false,'',false) ; 
		$next_item = get_adjacent_post(false,'',true) ;
		
		if (is_single() && get_post_type() == 'portfolio' ) { $closelink = get_permalink( get_option($sr_prefix.'_portfoliopage') ); } 
		else if (is_single() && get_post_type() == 'post' ) {$closelink = get_permalink( get_option('page_for_posts') );}
			
			$idAdd = '';
			if ($id && $id !== '') { $idAdd = ' id="'.esc_attr($id).'"'; }
			echo '<ul'.$idAdd.' class="'.esc_attr($class).'">';
			
				
			if ($prev_item && $prev_item->ID) { 
				$prev_post = get_post($prev_item->ID);
				$prevdisable = ''; 
				$prevlink = get_permalink( $prev_item->ID ); 
				$prevtitle = $prev_post->post_title; 
				$prevslug = $prev_item->post_name; 
				$previd = $prev_item->ID;
				$prevImg = '';
				if(get_post_type() == 'portfolio'&&!get_option($sr_prefix.'_portfoliopaginationimage')){$prevImg=get_the_post_thumbnail($prev_item->ID,'thumb-small');}
			} else { 
				$prevdisable = 'inactive'; 
				$prevlink = '#'; 
				$prevtitle = ''; 
				$prevslug = ''; 
				$previd = ''; 
				$prevImg = '';
			}
				echo '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url($prevlink).'" >'.$prevImg.'<span>'.esc_html($prevtext).'</span></a></li>'; 
			
			if ($backbutton) {
				echo '<li class="backtoworks"><a href="'.esc_url($closelink).'">'.esc_html($backbutton).'</a></li>';	
			}	
			
			if ($next_item && $next_item->ID) { 
				$next_post = get_post($next_item->ID);
				$nextdisable = ''; 
				$nextlink = get_permalink( $next_item->ID ); 
				$nexttitle = $next_post->post_title; 
				$nextslug = $next_item->post_name; 
				$nextid = $next_item->ID; 
				$nextImg = '';
				if (get_post_type() == 'portfolio'&&!get_option($sr_prefix.'_portfoliopaginationimage')){$nextImg=get_the_post_thumbnail($next_item->ID,'thumb-small');}
			} else { 
				$nextdisable = 'inactive'; 
				$nextlink = '#'; 
				$nexttitle = ''; 
				$nextslug = ''; 
				$nextid =''; 
				$nextImg =''; 
			}
				echo '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url($nextlink).'" >'.$nextImg.'<span>'.esc_html($nexttext).'</span></a></li>'; 
			
				
			echo '</ul>';
		
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Share
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_Share' ) ) {
	function sr_Share($type) {
		global $sr_prefix;
		global $wp_query;	
			
		$postid = $wp_query->post->ID;
		$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium' );;
		$og_img = $og_img[0];
		
			?>
		<ul class="socialmedia-widget">
			<li class="facebook"><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','','width=900, height=500, toolbar=no, status=no'); return(false);"></a></li>
			
			<li class="twitter"><a href="" onclick="window.open('https://twitter.com/intent/tweet?text=Tweet%20this&amp;url=<?php the_permalink(); ?>','','width=650, height=350, toolbar=no, status=no'); return(false);"></a></li>
			
			<li class="googleplus"><a href="" onclick="window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>&amp;image<?php echo esc_url($og_img); ?>','','width=900, height=500, toolbar=no, status=no'); return(false);"></a></li>
			
			<li class="pinterest"><a href="" onclick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url($og_img); ?>&amp;url=<?php the_permalink(); ?>','','width=650, height=350, toolbar=no, status=no'); return(false);"></a></li>
		</ul>
            <?php
		
	}						
}





/*-----------------------------------------------------------------------------------*/
/*	FILTER
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_filter' ) ) {
	function sr_filter($id,$class,$rel) {
		global $sr_prefix;
		global $wp_query;	
		
		$category = get_post_meta(get_the_ID(), $sr_prefix.'_portfoliocategories', true);
		if (get_query_var('portfolio_category')) { $category = get_query_var('portfolio_category'); }
		
		if ($category[0] == '') {
			$allCatsTmp = get_terms( 'portfolio_category');
			$category = array();
			foreach ($allCatsTmp as $c) { $category[] = $c->slug; }
		}
					
		echo '<ul id="'.esc_attr($id).'" class="filter '.esc_attr($class).'" data-related-grid="'.esc_attr($rel).'">
			<li><a class="active" data-filter-value="*">'.__('All', 'sr_avoc_theme').'</a></li>';
		foreach ($category as $c) { 
			$term = get_term_by('slug', $c, 'portfolio_category');
			$termlink = get_term_link($c, 'portfolio_category');
			if ($c !== '') {
				echo '<li><a data-filter-value=".'.esc_attr($c).'" href="'.esc_url($termlink).'" title="'.esc_attr($term->name).'">'.$term->name.'</a></li>';
			} 
		} 
		echo '</ul>';
		
	}						
}



/*-----------------------------------------------------------------------------------*/
/*	GET THE RALATED ID
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_getId' ) ) {
	function sr_getId() {
		global $sr_prefix;
		if (is_home() && is_front_page()) { $theId = get_option($sr_prefix.'_blogpage'); } else if (is_home()) { $theId = get_option( 'page_for_posts' );  } else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } else { $theId = get_option( 'page_for_posts' ); }
		return $theId;
	}						
}



?>