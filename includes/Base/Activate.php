<?php
/**
 * @package LearnWordpress
 */

namespace LW\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}