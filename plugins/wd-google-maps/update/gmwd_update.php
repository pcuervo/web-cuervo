<?php
function gmwd_update($version){
    global $wpdb;
    $api_key = $wpdb->get_var('SELECT id FROM ' . $wpdb->prefix . 'gmwd_options WHERE name="map_api_key"');
    if(!$api_key){
        $wpdb->query("INSERT INTO  `" . $wpdb->prefix . "gmwd_options` (`id`,  `name`, `value`, `default_value`) VALUES ('', 'map_api_key', '', '' ) ");
    }
    
    $header_titles = $wpdb->get_row("SHOW COLUMNS FROM ".$wpdb->prefix . "gmwd_maps LIKE 'store_locator_header_title'");
    if(!$header_titles){
        $wpdb->query("ALTER TABLE ".$wpdb->prefix . "gmwd_maps ADD  `store_locator_header_title`  VARCHAR(256) NOT NULL ");
    }
}


?>