<?php

namespace Kntnt\Parallax_Images;

class Settings extends Abstract_Settings {

	protected function menu_title() {
		return __( 'Kntnt Parallax Images', 'kntnt-parallax-images' );
	}

	protected function fields() {

		$fields['post_types'] = [
			'type' => 'checkbox group',
			'label' => __( "Enabled parallax", 'kntnt-parallax-images' ),
			'description' => __( 'The parallax effect will be applied on the front end of checked post types.', 'kntnt-lead' ),
			'options' => wp_list_pluck( get_post_types( [ 'public' => true ], 'objects' ), 'label' ),
			'default' => [ 'post' ],
		];

		$fields['selector'] = [
			'type' => 'text',
			'label' => __( 'Selector', 'kntnt-parallax-images' ),
			'description' => __( "CSS/jQuery selector(s) for images that should have the parallax behaviour, e.g. <code>.parallax img</code>, <code>img.parallax</code>, <code>figure &gt; img</code> and <code>img[class*='parallax']</code>. Separate several CSS/jQuery selectors with comma, e.g. <code>.parallax img, img[class*='parallax']</code>.", 'kntnt-parallax-images' ),
			'default' => '.parallax img, img.parallax',
		];

		$fields['percent_of_height'] = [
			'type' => 'integer',
			'label' => __( 'Height', 'kntnt-parallax-images' ),
			'description' => __( 'The height of the parallax viewing port as a percentage of the original image height that.', 'kntnt-parallax-images' ),
			'default' => 50,
		];

		$fields['submit'] = [
			'type' => 'submit',
		];

		return $fields;

	}

}
