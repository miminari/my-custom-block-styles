<?php

/**
 * Plugin Name: my custom block styles
 * Description: サイト用にカスタマイズしたブロックスタイルを追加します
 * Author: mimi
 * Version: 0.0.1
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
function mcbs_editor_style_setup()
{
    add_theme_support('editor-styles');
    // テーマからの相対パスで指定.
    add_editor_style('../../plugins/my-custom-block-styles/style.css');
}
add_action('after_setup_theme', 'mcbs_editor_style_setup', 12);

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
add_action('wp_enqueue_scripts','mcbs_front_style_setup',12);