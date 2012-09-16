<?php return array
	(
		// target-to-file mapping
		'targets' => array
			(

			//// Demo //////////////////////////////////////////////////////////

				'demo' => array
					(
						'components/base',
						'demofiles/demo'
					),

				'about' => array
					(
						'components/base',
						'demofiles/about'
					),

				'start' => array
					(
						'components/base',
						'demofiles/start'
					),

			//// Style Reference ///////////////////////////////////////////////

				'ref' => array # should be called only via mockup/
					(
						'+mockup'
					),
			
				'guide' => array
					(
						'+guide'
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
