<?php
/**
 * LearnWordpress Uninstall
 *
 * Uninstalling LearnWordpress deletes its related data.
 *
 * @package LearnWordpress
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN') ) {
	die;
}

// Clear related data ...
global $wpdb;
$wpdb->query( "DELETE FROM {$wpdb->prefix}posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM {$wpdb->prefix}postmeta WHERE post_id NOT IN (SELECT ID FROM {$wpdb->prefix}posts)" );
$wpdb->query( "DELETE FROM {$wpdb->prefix}term_relationships WHERE object_id NOT IN (SELECT ID FROM {$wpdb->prefix}posts)" );