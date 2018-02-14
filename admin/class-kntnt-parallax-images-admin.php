<?php

class Kntnt_Parallax_Images_Admin {

  // Plugin's namespace.
  private $ns;
  
  // Menu and page title
  private $title;
  
  // Required capability to see and change the settikngs of this plugin.
  private $capability;
  
  public function __construct($namespace) {

    $this->ns = $namespace;

    $this->title = __('Parallax images', 'kntnt-parallax-images');
    $this->capability = 'manage_options';

    add_action('admin_menu', [$this, 'add_options_page']);

  }
  
  // Add settings page to the option menu.
  public function add_options_page() {
    add_options_page($this->title, $this->title, $this->capability, $this->ns, [$this, 'show_settings_page']);
  }
  
  // Show settings page and update options.
  public function show_settings_page() {

    // Abort if curent user has not permission to access the settings page.
    if (!current_user_can('manage_options')) wp_die('Unauthorized use.', 'kntnt-parallax-images');

    // Update options if the page is showned after a form post.
    if (isset($_POST[$this->ns])) {

      // Abort if the form's nonce is not correct or expired.
      if (!wp_verify_nonce($_POST['_wpnonce'], $this->ns)) wp_die(__('Nonce failed.', 'kntnt-parallax-images'));

      // Update options.
      $this->update_options($_POST[$this->ns]);

    }

    // Render settings page.
    $fields = $this->fields();
    $values = get_option($this->ns);
    include "partials/{$this->ns}.php";

  }  
  
  // Returns all fields used on the settigs page.
  private function fields() { return [

      'selector' => [
        'type'        => 'text',
        'label'       => __('Selector', 'kntnt-parallax-images'),
        'description' => __("CSS or jQuery selector for images that should have the parallax behaviour, e.g. <code>img.parallax</code>, <code>figure &gt; img</code> or <code>img[class*='parallax']</code>. Please notice that you cannot use double quotation marks — only single quotation marks.", 'kntnt-parallax-images'),
      ],
      
  ];}
  
  // Sanitize and validate settings and update this plugins options.
  private function update_options($opt) {
    $opt['selector'] = sanitize_text_field(stripslashes($opt['selector']));
    update_option($this->ns, $opt);
  }
  
}
