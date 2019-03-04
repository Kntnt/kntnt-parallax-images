<?php

namespace Kntnt\Parallax_Images;

class Plugin extends Abstract_Plugin {

	protected function classes_to_load() {

		return [
			'public' => [
				'init' => [
					'Loader',
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
