<?php return array
	(
		'version' => '1.0.0',

		'loaders' => array # null = default configuration
			(
				'bootstrap' => null,
				'style' => array
					(
						'default.style' => 'night',
						'enabled' => ['night']
					),
				'javascript' => null,
			),

		// target-to-file mapping
		'mapping' => array
			(
				'frontend' => [ 'components/base', 'frontend' ],

			// error recovery pages

				'exception-Unknown' => [ 'components/error', 'errors/unknown' ],
				'exception-NotAllowed' => [ 'components/error', 'errors/not-allowed' ],
				'exception-NotFound' => [ 'components/error', 'errors/not-found' ],
			),

	); # theme
