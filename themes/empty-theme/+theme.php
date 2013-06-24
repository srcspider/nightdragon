<?php return array
	(
		'version' => '1.0.0',

		'loaders' => array # null = default configuration
			(
				'bootstrap' => null,
//				'dart' => [ 'head' => [ 'loader' ] ],
				'style' => array
					(
						'default.style' => 'example-style',
						'enabled' => ['example-style']
					),
				'javascript' => null,
			),

		// target-to-file mapping
		'mapping' => array
			(
				// empty
			),

	); # theme
