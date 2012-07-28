<?php return array
	(
		'whitelist' => array # allow
			(
				\app\A12n::guest() => array
					(
						// empty (inherits access protocols from \ibidem\access)
					),
				'+common' => array
					(
						\app\Protocol::instance()
							->relays
								([
									// general pages
									'frontend',
								])
					),
			),
		'blacklist' => array # disallow! (no matter what)
			(
				// empty
			),
		'aliaslist' => array # alias list
			(
				\app\A12n::guest() => array
					(
						'+common'
					),
				'member' => array
					(
						\app\A12n::guest(),
						'+common'
					),
				'admin' => array
					(
						\app\A12n::guest(),
						'+common',
						'+admin'
					),
			),
		'roles' => array
			(
				'member' => 1,
				'admin' => 2,
			),
	);
