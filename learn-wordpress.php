<?php
	/**
	 * @package LearnWordpress
	 *
	 * Plugin Name: Learn Wordpress
	 * Plugin URI: https://xingapps.win
	 * Description: Learning how to make wordpress plugins
	 * Version: 1.0.0
	 * Author: Xing Li
	 * Author URI: https://xingapps.win
	 * License: GPLv2 or later
	 * Text Domain: learn-wordpress
	 */

	if (! defined( 'ABSPATH') ) {
		die;
	}

	if  ( file_exists( __DIR__ . '/vendor/autoload.php') ) {
		require_once __DIR__ . '/vendor/autoload.php';
	}

	function activate_learn_wordpress() {
		\LW\Base\Activate::activate();
	}
	register_activation_hook( __FILE__, 'activate_learn_wordpress' );

	function deactivate_learn_wordpress() {
		\LW\Base\Deactivate::deactivate();
	}
	register_deactivation_hook( __FILE__, 'deactivate_learn_wordpress' );

	if ( class_exists( 'LW\\Init' ) ) {
		LW\Init::register_services();
	}