<?php namespace app;

// these are shorthand relay declarations

return array
	(
	
		'/' 
			=> [ 'demo' ],
	
		'/about' 
			=> [ 'about' ],
	
	
	//// API ///////////////////////////////////////////////////////////////////
	
		'/api/demo/<action>' 
			=> [ [ 'demo.jsent' => 'demo' ], ['action' => '(data)'] ],
	
	);