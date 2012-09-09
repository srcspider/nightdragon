<?php return array
	(
		'modules' => array
			(
				// project modules
				MODPATH.'demo' => 'demo\core',
			
				// development modules
				MODPATH.'+mockup' => 'mockup',

				// library legacy code
#				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'legacy' => 'ibidem\legacy',
			
				// library modules
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'backend' => 'ibidem\backend',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'access' => 'ibidem\access',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'base' => 'ibidem\base',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'cache' => 'ibidem\cache',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'theme' => 'ibidem\theme',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'schematics' => 'ibidem\schematics',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'database' => 'ibidem\database',
				PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'html' => 'ibidem\html',
			),
		'namespaces' => array
			(
				// libraries accessed via explicit calls only
				'ibidem\types' => PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'types',
				'ibidem\cfs' => PLGPATH.'ibidem'.DIRECTORY_SEPARATOR.'cfs',
			),
		'themes' => array
			(
				// explicit themes; themes can also just be embeded in modules,
				// in which case there's no need for them to appear here. If you
				// need to package configuration files such as language files
				// you can also create as a file path
				'classic' => DOCROOT.'themes/classic',
			),
	);