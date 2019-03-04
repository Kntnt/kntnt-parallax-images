<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Parallax Images
 * Plugin URI:        https://github.com/kntnt/kntnt-parallax-images
 * GitHub Plugin URI: https://github.com/kntnt/kntnt-parallax-images
 * Description:       Add parallax effects to images target with a CSS selector.
 * Version:           2.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       kntnt-parallax-images
 * Domain Path:       /languages
 */

namespace Kntnt\Parallax_Images;

defined( 'WPINC' ) || die;

// Set WP_DEBUG to TRUE in wp-config.php and uncomment next line to debug.
// define( 'KNTNT_Parallax_Images', true );

require_once __DIR__ . '/autoloader.php';

new Plugin();
