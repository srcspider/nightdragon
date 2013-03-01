<?php return array
	(
		'version' => '1.0',

		'loaders' => array # null = default configuration
			(
//				'dart' => [ 'head' => [ 'loader' ] ],
				'style' => [ 'default.style' => 'example-style' ],
				'javascript' => null,
				'bootstrap' => null,
			),

		// target-to-file mapping
		'mapping' => array
			(
				'home' => array
					(
						'base/foundation',
						'demo'
					),
				'dashboard' => array
					(
						'base/foundation',
						'dashboard'
					),
				'login' => array
					(
						'base/foundation',
						'login'
					),
			),

	); # theme
