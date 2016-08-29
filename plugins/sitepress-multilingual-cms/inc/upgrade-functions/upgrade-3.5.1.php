<?php

function update_icl_strings_charset_and_collations() {
	global $wpdb;

	if ( ! icl_table_column_exists( 'icl_strings', 'domain_name_context_md5' ) ) {
		include_once __DIR__ . '/upgrade-3.2.3.php';
	}
	
	$collate = false;

	if ( method_exists( $wpdb, 'has_cap' ) && $wpdb->has_cap( 'collation' ) ) {
		$collate = true;
	}

	$language_data = upgrade_3_5_1_get_language_charset_and_collation();

	$sql_template = "ALTER TABLE `{$wpdb->prefix}%s` MODIFY `%s` VARCHAR(%d) CHARACTER SET %s %s";

	$fields = array(
		array(
			'table' => 'icl_strings',
			'column' => 'name',
			'size' => WPML_STRING_TABLE_NAME_CONTEXT_LENGTH,
			'charset' => 'UTF8',
			'collation' => $collate ? 'COLLATE utf8_general_ci' : ''
		),
		array(
			'table' => 'icl_strings',
			'column' => 'context',
			'size' => WPML_STRING_TABLE_NAME_CONTEXT_LENGTH,
			'charset' => 'UTF8',
			'collation' => $collate ? 'COLLATE utf8_general_ci' : ''
		),
		array(
			'table' => 'icl_strings',
			'column' => 'domain_name_context_md5',
			'size' => 32,
			'charset' => 'LATIN1',
			'collation' => $collate ? 'COLLATE latin1_general_ci' : ''
		),
	);

	foreach ( $fields as $setting ) {
		if ( $wpdb->query( "SHOW TABLES LIKE '{$wpdb->prefix}{$setting['table']}'" ) ) {
			$sql = sprintf( $sql_template, $setting['table'], $setting['column'], $setting['size'], $setting['charset'], $setting['collation'] );

			if ( $wpdb->query( $sql ) === false ) {
				throw new Exception( $wpdb->last_error );
			}
		}
	}

	recreate_st_db_cache_tables( $language_data );
}

function upgrade_3_5_1_get_language_charset_and_collation() {

	global $wpdb;

	$data = null;

	$column_data = $wpdb->get_results( "SELECT * FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='{$wpdb->prefix}icl_strings' AND TABLE_SCHEMA='{$wpdb->dbname}' ");
	foreach ( $column_data as $column ) {
		if ( 'language' === $column->COLUMN_NAME ) {
			$data['collation'] = $column->COLLATION_NAME;
			$data['charset'] = $column->CHARACTER_SET_NAME;
		}
	}

	return $data;
}

function recreate_st_db_cache_tables( $language_data ) {
	global $wpdb;

	$wpdb->query( "DROP TABLE IF EXISTS `{$wpdb->prefix}icl_string_pages`" );
	$wpdb->query( "DROP TABLE IF EXISTS `{$wpdb->prefix}icl_string_urls`" );

	$sql = '
	CREATE TABLE IF NOT EXISTS `%sicl_string_urls` (
	  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	  `language` varchar(5) %s DEFAULT NULL,
	  `url` varchar(255) DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `string_string_lang_url` (`language`,`url`(191))
	)';

	$charset_collation = $wpdb->get_charset_collate();
	$field_charset_collation   = 'CHARACTER SET ' . $language_data['charset'] . ' COLLATE ' . $language_data['collation'];
	$sql = sprintf( $sql, $wpdb->prefix, $field_charset_collation );
	$sql .= $charset_collation;

	$result = $wpdb->query( $sql );

	if ( $result ) {
		$sql = "	
		CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}icl_string_pages` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `string_id` bigint(20) NOT NULL,
		  `url_id` bigint(20) NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `string_string_id_to_url_id` (`string_id`,`url_id`)
		)";
		$sql .= $charset_collation;

		$wpdb->query( $sql );
	}
}

update_icl_strings_charset_and_collations();
