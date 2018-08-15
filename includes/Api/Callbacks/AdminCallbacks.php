<?php

	/**
	 * @package LearnWordpress
	 */

	namespace LW\Api\Callbacks;

	use LW\Base\BaseController;

	class AdminCallbacks extends BaseController
	{
		public function adminDashboard() {
			return require "$this->plugin_path/templates/admin.php";
		}

		public function learnWordpressCpt() {
			return require "$this->plugin_path/templates/post-types.php";
		}

		public function learnWordpressTaxonomies() {
			return require "$this->plugin_path/templates/taxonomies.php";
		}

		public function learnWordpressWidgets() {
			return require "$this->plugin_path/templates/widgets.php";
		}

	}