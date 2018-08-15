<?php
	/**
	 * @package LearnWordpress
	 */

	namespace LW\Api\Callbacks;

	use LW\Base\BaseController;

	class ManagerCallbacks extends BaseController
	{
		public function checkboxSanitize($input)
		{
			//return filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
			return $input !== null;
		}

		public function learnWordpressAdminSectionManager()
		{
			echo 'Manage admin section of learn wordpress.';
		}

		public function checkboxField( $args )
		{
			var_dump( $args );
			return;
		}


	}