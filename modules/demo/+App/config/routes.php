<?php return array
	(

		'/'
			=> [ 'home.public' ],

		'/dashboard'
			=> [ 'dashboard.public' ],

		'/login(/<action>)'
			=> [ 'login.public', [ 'action' => '(signin|signout|pwdreset)' ] ],

	);
