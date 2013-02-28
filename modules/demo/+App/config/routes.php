<?php return array
	(

		'/'
			=> [ 'home.public' ],

		'/dashboard'
			=> [ 'dashboard.public' ],

		'/login(/<action>)'
			=> [ 'login.public', [ 'action' => '(signin|signout|pwdreset)' ] ],

	// aliases to static content
	
		'/thumbs/timthumb-2.8.10.php?src=<image>&w=<width>&h=<height>'
			=> [ 'image.static' ], # parameters not required
	
	);
