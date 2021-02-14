<?php


namespace Kntnt\Parallax_Images;


class Load_JS {

	public function run() {
		if ( is_singular( Plugin::option( 'post_types' ) ) ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'load_js' ] );
		}
	}

	public function load_js() {
		wp_enqueue_script( 'kntnt-parallax-images.js', Plugin::plugin_url( 'js/kntnt-parallax-images.js' ), [ 'jquery' ], Plugin::version(), true );
		wp_localize_script( 'kntnt-parallax-images.js', 'kntnt_parallax_images', [ 'selector' => Plugin::option( 'selector' ) ] );
	}

}