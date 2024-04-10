<?php
/**
 * Provides a singleton pattern for classes
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE\Utils;

abstract class Singleton {
	private static $instances = array();

	protected function __construct() {
	}
	protected function __clone() {
	}
	public function __wakeup() {
		throw new \Exception( 'Cannot unserialize a singleton.' );
	}

	public static function get_instance() {
		$cls = static::class;
		if ( ! isset( self::$instances[ $cls ] ) ) {
			self::$instances[ $cls ] = new static();
		}

		return self::$instances[ $cls ];
	}
}
