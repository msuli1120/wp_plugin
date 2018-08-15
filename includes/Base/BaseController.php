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

	namespace LW\Base;

	class BaseController
	{
		public $plugin_path;
		public $plugin_url;

		public function __construct(  ) {
			$this->plugin_path = plugin_dir_path( \dirname( __FILE__, 2 ) );
			$this->plugin_url = plugin_dir_url( \dirname( __FILE__, 2) );
			$this->plugin = plugin_basename( \dirname( __FILE__ , 3) . '/learn-wordpress.php');
		}
	}