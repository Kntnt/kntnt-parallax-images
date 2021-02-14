<?php

/**
 * Plugin main file.
 *
 * @wordpress-plugin
 * Plugin Name:       Kntnt Parallax Images
 * Plugin URI:        https://github.com/Kntnt/kntnt-parallax-images
 * GitHub Plugin URI: https://github.com/Kntnt/kntnt-parallax-images
 * Description:       Add parallax effects to images target with a CSS or jQuery selector.
 * Version:           1.1.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


namespace Kntnt\Parallax_Images;

require 'autoload.php';

defined( 'WPINC' ) && new Plugin;