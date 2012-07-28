<?php return array
	(
		'version' => '1.0', # used in cache busting; update as necesary

		// set the style.root to '' (empty string) when writing (entirely) just
		// plain old css files; and not compiling sass scripts, etc
		'style.root' => 'root'.DIRECTORY_SEPARATOR,

		// common files
		'common' => array
			(
				'lib/boilerplate-1.1', 
				'unsorted'
			),
	
		// mapping targets to files; if a target is not mapped it won't have
		// any style associated
		'targets' => array
			(
				'frontend' => array
					(
						// has style, inherits common
					),
			),
	);

