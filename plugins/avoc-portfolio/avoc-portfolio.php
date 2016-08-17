<?php
/**
 * Plugin Name: Avoc Portfolio
 * Plugin URI: http://spab-rice.com
 * Description: This plugin adds the portfolio post type for the avoc theme
 * Version: 1.1
 * Author: Spab Rice
 * Author URI: http://spab-rice.com
 * License: GPL2
 */
 

/*-----------------------------------------------------------------------------------*/
/*	Register new Post-type
/*-----------------------------------------------------------------------------------*/ 
add_action('init', 'sr_portfolio_post_type');

function sr_portfolio_post_type(){
	
	$rewriteSlug = "portfolio";
	if (get_option('_sr_portfoliourl') && get_option('_sr_portfoliourl') !== "") { 
		$rewriteSlug = get_option('_sr_portfoliourl');
	} 
	
	register_post_type('portfolio', array(
		'labels' => array(
				'name' => __("Portfolio", 'sr_avoc_theme'),
				'singular_name' => __("Project", 'sr_avoc_theme')
			),
		'public' => true,
		'show_ui' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions','excerpt'),
		'menu_icon' => plugin_dir_url( __FILE__ ) . 'images/portfolio.png',
		'rewrite' => array(
			'slug' => $rewriteSlug,
			'with_front' => false
			),
		'has_archive' => false,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'exclude_from_search' => false,
		'publicly_queryable' => true
	) );
	
}



/*-----------------------------------------------------------------------------------*/
/*	Add taxonomies
/*-----------------------------------------------------------------------------------*/
add_action('init', 'sr_portfolio_taxonomies', 0);

function sr_portfolio_taxonomies(){
	
	// Categories Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'label' => __("Portfolio categories", 'sr_avoc_theme'),
			'query_var' => true,
			'rewrite' => true
		)
	);
	
	
}



/*-----------------------------------------------------------------------------------*/
/*	Manage columns
/*-----------------------------------------------------------------------------------*/

add_filter("manage_edit-portfolio_columns", "sr_portfolio_edit_columns");
function sr_portfolio_edit_columns($columns){
	$columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => __("Title", 'sr_avoc_theme'),
		"portfolio_category" => __("Category", 'sr_avoc_theme'),
		"date" => __("Date", 'sr_avoc_theme')
	);
	return $columns;
}


 
 ?>