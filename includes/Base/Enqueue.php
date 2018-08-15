<?php

	/**
	 * @package LearnWordpress
	 */

namespace LW\Base;

class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function enqueue() {
		wp_enqueue_style( 'learnwordpressstyle', $this->plugin_url . 'assets/mystyle.css' );
		wp_enqueue_script( 'learnwordpressscript', $this->plugin_url . 'assets/myscript.js', array( 'jquery' ), '1.0.0', true );
	}
}