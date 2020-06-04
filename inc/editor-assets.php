<?php

namespace SimpleGutenbergBoilerplate\EditorAssets;

use function SimpleGutenbergBoilerplate\plugin_dir;

use function SimpleGutenbergBoilerplate\plugin_url;

/**
 * Initializes the editor assets
 */
function init() {
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_editor_assets', 100 );
	add_action( 'enqueue_block_assets', __NAMESPACE__ . '\\enqueue_front_assets', 100 );
}

/**
 * Returns the assets file contents inside build folder.
 *
 * @param string $file Assets file basename.
 *
 * @return bool|mixed
 */
function get_assets_file( $file ) {
	/** @var \WP_Filesystem_Base $wp_filesystem */
	global $wp_filesystem;

	require_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();

	$filename = plugin_dir() . "/build/$file.asset.php";
	if ( ! $wp_filesystem->is_readable( $filename ) ) {
		return false;
	}

	return include $filename;
}

/**
 * Enqueue Gutenberg frontend assets
 */
function enqueue_front_assets() {
	$assets_file = get_assets_file( 'front' );
	if ( ! $assets_file ) {
		return;
	}

	wp_enqueue_script( 'simple-boilerplate', plugin_url() . '/build/front.js', $assets_file['dependencies'], $assets_file['version'] );

	$front_file = plugin_url() . '/build/front.css';
	wp_enqueue_style( 'simple-boilerplate', plugin_url() . '/build/front.css', [], filemtime( $front_file ) );
}

/**
 * Enqueue Gutenberg admin assets
 */
function enqueue_editor_assets() {
	$assets_file = get_assets_file( 'editor' );
	if ( ! $assets_file ) {
		return;
	}

	wp_enqueue_script( 'simple-boilerplate', plugin_url() . '/build/editor.js', $assets_file['dependencies'], $assets_file['version'] );

	$editor_file = plugin_url() . '/build/editor.css';
	wp_enqueue_style( 'simple-boilerplate', $editor_file, [], filemtime( $editor_file ) );
}
