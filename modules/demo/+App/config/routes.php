<?php namespace app;

// these are shorthand relay declarations

return array
	(

		'/'
			=> [ 'demo' ],

		'/about'
			=> [ 'about' ],

		'/start'
			=> [ 'start' ],


	//// API (example) /////////////////////////////////////////////////////////

		'/api/Demo/<action>'
			=> [ [ 'demo.json' => 'demo' ], ['action' => '(entries)'] ],

	);