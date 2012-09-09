<?php namespace app;

// these are shorthand relay declarations

return array
	(
	
		'/' 
			=> [ 'frontend' ],
	
		'/about' 
			=> [ 'about' ],
	
	
	//// API ///////////////////////////////////////////////////////////////////
	
		'/api/frontend/<action>' 
			=> [ [ 'frontend.jsent' => 'frontend' ], ['action' => '(status)'] ],
	
	);