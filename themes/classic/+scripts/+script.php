<?php return array
	(
		'version' => '1.0', # used in cache busting; update as necesary

		// set the script.root to '' (empty string) when writing (entirely) just
		// plain old js files; and not compiling coffee scripts, etc
		'script.root' => 'src'.DIRECTORY_SEPARATOR,
	
		// will be included in all explicity targets; if a target needs to be
		// script free then simply ommit it in the targets declaration bellow
		'common' => array
			(
				'lib/plugins/jquery-1.7.2',
			),
	
		// enables closure compiler mode
		'closure-mode' => true,

		// mapping targets to files
		'targets' => array
			(
				'frontend' => array
					(
						// load common
					),
			
			//// Exceptions ////////////////////////////////////////////////////
			
				'exception-NotFound' => array
					(
						// empty
					),
				'exception-NotAllowed' => array
					(
						// empty
					),
				'exception-NotApplicable' => array
					(
						// empty
					),
				'exception-Unknown' => array
					(
						// empty
					),
			),
	);

