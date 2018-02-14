<?php

class Kntnt_Parallax_Images_Public {

  // Plugin's namespace.
  private $ns;
  
  public function __construct($ns) {
    $this->ns = $ns;
    add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
  }

  public function enqueue_assets() {
    $name = "{$this->ns}.js";
    wp_enqueue_script($name, plugins_url("/js/$name", __FILE__), ['jquery']);
    wp_add_inline_script($name, $this->get_inline_script());
  }
  
  private function get_inline_script() {
    $selector = get_option($this->ns)['selector'];
    ob_start();
    include_once "partials/{$this->ns}.js.php";
    return ob_get_clean();
  }
  
}
