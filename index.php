<?php

/**
 * Plugin Name:       Interactivity API Session
 * Version:           0.0.1
 * Requires at least: 6.0
 * Requires PHP:      5.6
 * Description:       Plugin that extends the usage of the Interactivity API.
 * Author:            Mario Santos
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       interactivity-api-session
 */

// require_once __DIR__ . '/hooks/add-class-hook.php';
require_once __DIR__ . '/hooks/add-zoom-hook.php';


// We need these filters to ensure the view.js files can access the window.__experimentalInteractivity
// Once the bundling is solved and we stop using
// window.__experimentalInteractivity we can remove them.
// enqueue_interactive_blocks_scripts( 'movie-like-icon' );

/**
 * A helper function that enqueues scripts for the interactive blocks.
 *
 * @param string $block - The block name.
 * @return void
 */
function session_enqueue_interactive_blocks_scripts($block)
{
	$interactive_block_filter = function ($content) use ($block) {
		wp_register_script(
			'session/' . $block,
			plugin_dir_url(__FILE__) . 'build/blocks/' . $block . '/view.js',
			array('wp-directive-runtime'),
			'1.0.0',
			true
		);
		wp_enqueue_script('session/' . $block);
		return $content;
	};
	add_filter('render_block_session/' . $block, $interactive_block_filter);
}

function session_auto_register_block_types()
{
	// Register all the blocks in the plugin
	if (file_exists(__DIR__ . '/build/blocks/')) {
		$block_json_files = glob(__DIR__ . '/build/blocks/*/block.json');

		// auto register all blocks that were found.
		foreach ($block_json_files as $filename) {
			$block_folder = dirname($filename);
			register_block_type($block_folder);
		};
	};
}

add_action('init', 'session_auto_register_block_types');

function session_add_script_dependency($handle, $dep)
{
	global $wp_scripts;

	$script = $wp_scripts->query($handle, 'registered');
	if (!$script)
		return false;

	if (!in_array($dep, $script->deps, true)) {
		$script->deps[] = $dep;

		// move script to the footer if it's not already there
		$wp_scripts->add_data($handle, 'group', 1);
	}

	return true;
}

add_action('wp_enqueue_scripts', 'session_auto_inject_interactivity_dependency');

function session_auto_inject_interactivity_dependency()
{
	$registered_blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();

	foreach ($registered_blocks as $name => $block) {
		$has_interactivity_support = $block->supports['interactivity'] ?? false;

		if (!$has_interactivity_support) {
			continue;
		}
		foreach ($block->view_script_handles as $handle) {
			session_add_script_dependency($handle, 'wp-directive-runtime');
		}
	}
}

// Enqueue React
add_action('wp_enqueue_scripts', 'enqueue_react_js'); // Loads on frontend

function enqueue_react_js()
{

	wp_enqueue_script(
		'react-frontend',
		plugin_dir_url(__FILE__) . 'build/blocks/show-text-react/view.js',
		['wp-element'],
		null, // Change this to null for production
		true
	);
}
