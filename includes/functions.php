<?php
/**
 * UIX Auto-loader Loader Functions
 *
 * @package   uix
 * @author    David Cramer
 * @license   GPL-2.0+
 * @copyright 2016 David Cramer
 */


/**
 * UIX Object class autoloader.
 * It locates and finds class via classes folder structure.
 *
 * @since 1.0.0
 *
 * @param string $class class name to be checked and autoloaded
 */
function uix_autoload_class( $class ) {
	$parts = explode( '\\', $class );
	$name  = array_shift( $parts );
	if ( file_exists( UIX_PATH . 'classes/' . $name ) ) {
		if ( ! empty( $parts ) ) {
			$name .= '/' . implode( '/', $parts );
		}
		$class_file = UIX_PATH . 'classes/' . $name . '.php';
		if ( file_exists( $class_file ) ) {
			include_once $class_file;
		}
	}
}

/**
 * UIX Helper to minipulate the overall UI instance.
 *
 * @since 1.0.0
 */
function uix() {
	// init UI
	return \UIX_Loader::get_instance();
}

/**
 * UIX Helper to minipulate the overall UI instance.
 *
 * @since 1.0.0
 */
function uix_share() {
	// init UI
	return \uix\share\share::get_instance();
}

