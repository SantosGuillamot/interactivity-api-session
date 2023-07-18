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


