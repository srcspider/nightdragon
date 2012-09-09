<?php return array
	(	
		// target-to-file mapping
		'targets' => array
			(
				'frontend' => array
					(
						'components/base',
						'frontend' 
					),
			
				'about' => array
					(
						'components/base',
						'about' 
					),
			
			//// Style Reference ///////////////////////////////////////////////
			
				'ref' => array # should be called only via mockup/
					(
						'+mockup'
					),
			
			//// Exceptions ////////////////////////////////////////////////////
			
				'exception-NotFound' => array
					(
						'components/errors/base',
						'errors/not-found' 
					),
				'exception-NotAllowed' => array
					(
						'components/errors/base',
						'errors/not-allowed' 
					),
				'exception-NotApplicable' => array
					(
						'components/errors/base',
						'errors/not-applicable' 
					),
				'exception-Unknown' => array
					(
						'components/errors/base',
						'errors/unknown' 
					),
			),
	);
