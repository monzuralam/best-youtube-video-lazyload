<?php
/**
 * Plugin Name:       WP Youtube Video Lazy Load
 * Plugin URI:        https://viserx.com
 * Description:       Best Youtube video Lazyload for WordPress.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Monzur Alam
 * Author URI:        https://profiles.wordpress.org/monzuralam
 * Text Domain:       wp-youtube-video-lazyload
 * Domain Path :      /languages/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and 
 * Rename this for your plugin and update it as you release new versions.
 */
define('wp-youtube-video-lazyload', '1.0.0');

/**
 * enqueue style & script
 */
function wp_youtube_video_lazyload_assets()
{
    wp_register_script('yt-video-lazyload', plugins_url('assets/js/yt-lazyload.js', __FILE__), array(), time(),  true);
    wp_register_script('yt-video-script', plugins_url('assets/js/scripts.js', __FILE__), array(), time(),  true);
    wp_enqueue_script('yt-video-lazyload');
    wp_enqueue_script('yt-video-script');

    wp_register_style('yt-video-lazyload', plugins_url('assets/css/yt-lazyload.css', __FILE__), false, time(), 'all');
    wp_register_style('yt-video-style', plugins_url('assets/css/style.css', __FILE__), false, time(), 'all');
    wp_enqueue_style('yt-video-lazyload');
    wp_enqueue_style('yt-video-style');

}
add_action('wp_enqueue_scripts', 'wp_youtube_video_lazyload_assets');

function wp_youtube_video_lazyload_textdomain(){
    load_plugin_textdomain('youtube-video-lazyload',false,dirname(__FILE__)."/languages");
}
add_action('plugins_loaded','wp_youtube_video_lazyload_textdomain');

function wp_youtube_video_lazyload_shortcode($atts){
    $atts = shortcode_atts(array(
        'id'    =>  'P1aKNG4SJfg',
        'thumb' =>  ''
    ),$atts);

    $thumb = $atts['thumb'] ? $atts['thumb'] : 'https://i3.ytimg.com/vi/'.$atts['id'].'/0.jpg';

    return '<div class="yt-lazyload" data-id="'.$atts['id'].'" data-thumb="'.$thumb.'" data-logo="2"></div>';
}
add_shortcode('youtube_lazyload','wp_youtube_video_lazyload_shortcode');