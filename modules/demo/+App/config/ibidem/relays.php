<?php return array
	(
		// enable base routes
		'\ibidem\access\channel'  => [ 'enabled' => true ],
		'\ibidem\access\endpoint' => [ 'enabled' => true ],
		'\ibidem\access\a12n'     => [ 'enabled' => true ],
		'\ibidem\backend'         => [ 'enabled' => true ],
		
		'frontend' => array
			(
				'enabled' => true,
				'route' => \app\Route_Pattern::instance()->standard('', []),
				'controller' => '\app\Controller_Frontend',
				'action' => 'action_index',
			)
	);
