<?php

/**
 * @package LearnWordpress
*/

namespace LW\Pages;

use LW\Api\Callbacks\ManagerCallbacks;
use LW\Api\SettingsApi;
use LW\Base\BaseController;
use LW\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;
	public $callbacks;
	public $callbacks_manager;
	public $pages = [];
	public $sub_pages = [];

	public function __construct() {
		parent::__construct();
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->callbacks_manager = new ManagerCallbacks();
	}

	public function register() {

		$this->setPages();

		$this->setSubPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->sub_pages )->register();
	}

	private function setPages() {
		$this->pages = [
			[
				'page_title' => 'Learn Wordpress',
				'menu_title' => 'Learn Wordpress',
				'capability' => 'manage_options',
				'menu_slug' => 'learn_wordpress',
				'callback' => array( $this->callbacks, 'adminDashboard' ),
				'icon_url' => 'dashicons-store',
				'position' => 110
			]
		];
	}

	private function setSubPages() {
		$this->sub_pages = [
			[
				'parent_slug' => 'learn_wordpress',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'learn_wordpress_cpt',
				'callback' => array( $this->callbacks, 'learnWordpressCpt' ),
			],
			[
				'parent_slug' => 'learn_wordpress',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'learn_wordpress_taxonomies',
				'callback' => array( $this->callbacks, 'learnWordpressTaxonomies' ),
			],
			[
				'parent_slug' => 'learn_wordpress',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'learn_wordpress_widgets',
				'callback' => array( $this->callbacks, 'learnWordpressWidgets' ),
			],
		];
	}

	private function setSettings() {
		$args = [
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'cpt_manager',
				'callback' => array( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'taxonomy_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'media_widget',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'gallery_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'testimonial_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'templates_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'login_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'membership_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			],
			[
				'option_group' => 'learn_wordpress_settings',
				'option_name' => 'chat_manager',
				'callback' => array ( $this->callbacks_manager, 'checkboxSanitize' )
			]
		];

		$this->settings->setSettings( $args );
	}

	private function setSections() {
		$args = [
			[
				'id' => 'learn_wordpress_admin_index',
				'title' => 'Settings Manager',
				'callback' => array( $this->callbacks_manager, 'learnWordpressAdminSectionManager' ),
				'page' => 'learn_wordpress'
			]
		];
		$this->settings->setSections( $args );
	}

	private function setFields() {
		$args = [
			[
				'id' => 'cpt_manager',
				'title' => 'Activate CPT Manager',
				'callback' => array( $this->callbacks_manager, 'checkboxField' ),
				'page' => 'learn_wordpress',
				'section' => 'learn_wordpress_admin_index',
				'args' => array(
					'label_for' => 'cpt_manager',
					'class' => 'ui-toggle'
				)
			],
		];
		$this->settings->setFields($args);
	}
}