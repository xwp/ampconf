<?php
/**
 * Bootstraps the Unit Tests.
 *
 * @package AMP\Theme\Tests\Integration
 * @since 0.1
 */

if ( ! file_exists( '../../../wp-content' ) ) {
	trigger_error( 'PHPUnit can only run in a WP environment', E_USER_ERROR ); // @codingStandardsIgnoreLine.
}

define( 'AMP_THEME_DIR', dirname( __DIR__ ) );
define( 'WP_CONTENT_DIR', dirname( dirname( getcwd() ) ) ); // @codingStandardsIgnoreLine.

if ( defined( 'WP_CONTENT_DIR' ) && ! defined( 'WP_PLUGIN_DIR' ) ) {
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins/' ); // @codingStandardsIgnoreLine.
}

$beans_tests_dir = getenv( 'WP_TESTS_DIR' );

// Travis CI & Vagrant SSH tests directory.
if ( empty( $beans_tests_dir ) ) {
	$beans_tests_dir = '/tmp/wordpress-tests';
}

// Relative path to Core tests directory.
if ( ! file_exists( $beans_tests_dir . '/includes/' ) ) {
	$beans_tests_dir = '../../../../tests/phpunit';
}

if ( ! file_exists( $beans_tests_dir . '/includes/' ) ) {
	trigger_error( 'Unable to locate wordpress-tests-lib', E_USER_ERROR ); // @codingStandardsIgnoreLine.
}

// Give access to tests_add_filter() function.
require_once getenv( 'WP_TESTS_DIR' ) . '/includes/functions.php';

/**
* Loads theme.
*/
tests_add_filter( 'setup_theme', function() {
	register_theme_directory( WP_CONTENT_DIR . '/themes' );
	switch_theme( basename( AMP_THEME_DIR ) );
} );

// Start up the WP testing environment.
require getenv( 'WP_TESTS_DIR' ) . '/includes/bootstrap.php';
