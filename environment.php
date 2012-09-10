<?php return array
	(
		'modules' => array
			(
				// project modules
				MODPATH.'demo' => 'demo\core',

				// development modules
				MODPATH.'+mockup' => 'mockup',

				// library legacy code
//				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'legacy' => 'mjolnir\legacy',

				// library modules
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'backend' => 'mjolnir\backend',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'access' => 'mjolnir\access',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'base' => 'mjolnir\base',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'cache' => 'mjolnir\cache',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'theme' => 'mjolnir\theme',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'schematics' => 'mjolnir\schematics',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'database' => 'mjolnir\database',
				PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'html' => 'mjolnir\html',
			),

		'namespaces' => array
			(
				// libraries accessed via explicit calls only
				'mjolnir\types' => PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'types',
				'mjolnir\cfs' => PLGPATH.'mjolnir'.DIRECTORY_SEPARATOR.'cfs',
			),

		'themes' => array
			(
				// explicit themes; themes can also just be embeded in modules,
				// in which case there's no need for them to appear here. If you
				// need to package configuration files such as language files
				// you can also create as a file path
				'classic' => DOCROOT.'themes/classic',
			),

	); # config