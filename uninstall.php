<?php

defined('WP_UNINSTALL_PLUGIN') || die;

require_once __DIR__ . '/kntnt-parallax-images.php';

// Delete options.
delete_option('kntnt-parallax-images');
