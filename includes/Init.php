<?php
	/**
	 * @package LearnWordpress
	 */
	namespace LW;

	final class Init
	{

		public static function get_services(): array {
			return [
				Pages\Admin::class,
				Base\Enqueue::class,
				Base\SettingLinks::class,
			];
		}

		public static function register_services(): void {
			foreach ( self::get_services() as $class ) {
				$service = self::instantiate( $class );
				if ( method_exists( $service, 'register' ) ) {
					$service->register();
				}
			}
		}

		private static function instantiate( $class ) {
			return new $class();
		}

	}