<?php
	/**
	 * @package LearnWordpress
	 */

	namespace LW\Base;

	class SettingLinks extends BaseController
	{
		public function register() {
			add_filter( "plugin_action_links_{$this->plugin}", array( $this, 'settingsLink' ) );
		}

		public function settingsLink( $links ) {
			$settings_link = '<a href="admin.php?page=learn_wordpress">Settings</a>';
			$links[]       = $settings_link;
			return $links;
		}
	}
