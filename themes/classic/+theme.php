<?php return array
	(	
		// mapping targets to files
		'targets' => array
			(
				'frontend' => array
					(
						'common/html5', 'frontend' 
					),
			
			//// Style /////////////////////////////////////////////////////////
			
				'style' => array
					(
						'+mockup'
					),
			
			//// Exceptions ////////////////////////////////////////////////////
			
				'exception-NotFound' => array
					(
						'errors/not-found' 
					),
				'exception-NotAllowed' => array
					(
						'errors/not-allowed' 
					),
				'exception-NotApplicable' => array
					(
						'errors/not-applicable' 
					),
				'exception-Unknown' => array
					(
						'errors/unknown' 
					),
			),
	);
