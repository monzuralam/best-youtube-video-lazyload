<?php
/**
 * Plugin Name:       Youtube Video Lazy Load
 * Plugin URI:        https://viserx.com
 * Description:       Best Youtube audio & video Lazyload for WordPress.
 * Version:           0.0.1
 * Author:            Monzur Alam
 * Author URI:        https://profiles.wordpress.org/monzuralam
 * Text Domain:       youtube-video-lazyload
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Currently plugin version.
 * Start at version 0.0.1 and 
 * Rename this for your plugin and update it as you release new versions.
 */
define('youtube-video-lazyload', '0.0.1');

/**
 * enqueue style & script
 */
function youtube_video_lazyload_assets()
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
add_action('wp_enqueue_scripts', 'youtube_video_lazyload_assets');


