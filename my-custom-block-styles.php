<?php

/**
 * Plugin Name: my custom block styles
 * Description: サイト用にカスタマイズしたブロックスタイルを追加します
 * Author: mimi
 * Version: 0.0.2
 * Text Domain: mcbs
 */

define('MCBS_PLUGIN_URL', untrailingslashit(plugin_dir_url(__FILE__)));
define('MCBS_PLUGIN_PATH', untrailingslashit(plugin_dir_path(__FILE__)));

/**
 * Add custom block style
 * カスタムブロックスタイルを追加.
 *
 * @return void
 */
function mcbs_style_setup()
{
    register_block_style(
        'core/button',
        array(
            'name' => 'arrow',
            'label' => '矢印付き'
        )
    );
}
add_action('after_setup_theme', 'mcbs_style_setup');

/**
 * Add custom editor style
 * カスタムエディタースタイルを反映.
 *
 * @return void
 */
add_action(
	'enqueue_block_editor_assets',
	function() {
		wp_enqueue_style(
			'my-custom-block-styles-for-editor',
			plugin_dir_url(__FILE__) . 'editor-style.css',
			false,
			filemtime(plugin_dir_path(__FILE__) . 'editor-style.css')
		);
	}
);

/**
 * Add custom front style
 * カスタムスタイルをフロントに反映.
 *
 * @return void
 */
function mcbs_front_style_setup()
{
    wp_enqueue_style('my-custom-block-styles', MCBS_PLUGIN_URL . '/style.css', false, filemtime(MCBS_PLUGIN_PATH . '/style.css'));
}
add_action('wp_enqueue_scripts', 'mcbs_front_style_setup', 12);
