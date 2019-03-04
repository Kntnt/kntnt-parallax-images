<?php

namespace Kntnt\Parallax_Images;

class Loader {

    public function run() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets() {
        $ns = Plugin::ns();
        $selector = stripslashes(Plugin::option('selector'));
        $inline_script = Plugin::load_template('loader.php', ['selector' => $selector]);
        error_log("\$selector = $inline_script");
        wp_enqueue_script("$ns.js", Plugin::rel_plugin_dir("js/$ns.js"), ['jquery']);
        wp_add_inline_script("$ns.js", $inline_script);
    }

}
