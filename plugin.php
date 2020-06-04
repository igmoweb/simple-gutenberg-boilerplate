<?php
/**
 * Plugin Name: Simple Gutenberg Boilerplate
 */

namespace SimpleGutenbergBoilerplate;

/**
 * Initializes the plugin.
 */
function init() {
	require_once __DIR__ . '/inc/class-plugin.php';
	require_once __DIR__ . '/inc/editor-assets.php';

	( new Plugin() )->init();
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\init' );

/**
 * Return the plugin directory
 *
 * @return string
 */
function plugin_dir() {
	return plugin_dir_path( __FILE__ );
}

/**
 * Return the plugin URL
 *
 * @return string
 */
function plugin_url() {
	return plugin_dir_url( __FILE__ );
}
