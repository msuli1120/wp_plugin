<?php
/**
 * @package LearnWordpress
*/

namespace LW\Base;

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}