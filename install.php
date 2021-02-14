<?php

defined( 'WPINC' ) || die;

add_option( 'kntnt-parallax-images', [
	'post_types' => [
		'post' => 'post',
	],
	'selector' => '.parallax img, img.parallax',
	'percent_of_height' => 50,
] );