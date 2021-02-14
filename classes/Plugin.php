<?php


namespace Kntnt\Parallax_Images;


final class Plugin extends Abstract_Plugin {

	use Options;

	public function classes_to_load() {
		return [
			'public' => [
				'wp' => [
					'Load_JS',
				],
			],
			'admin' => [
				'init' => [
					'Settings',
				],
			],
		];
	}

}
