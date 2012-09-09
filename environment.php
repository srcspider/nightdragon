<?php return array
	(
		'modules' => array
			(
				// project modules
				MODPATH.'demo' => 'demo\core',

				// development modules
				MODPATH.'+mockup' => 'mockup',

				// library legacy code
				MJLPATH.'legacy' => 'mjolnir\legacy',

				// library modules
				MJLPATH.'backend' => 'mjolnir\backend',
				MJLPATH.'access' => 'mjolnir\access',
				MJLPATH.'base' => 'mjolnir\base',
				MJLPATH.'cache' => 'mjolnir\cache',
				MJLPATH.'theme' => 'mjolnir\theme',
				MJLPATH.'schematics' => 'mjolnir\schematics',
				MJLPATH.'database' => 'mjolnir\database',
				MJLPATH.'html' => 'mjolnir\html',
			),

		'namespaces' => array
			(
				// libraries accessed via explicit calls only
				'mjolnir\types' => MJLPATH.'types',
				'mjolnir\cfs' => MJLPATH.'cfs',
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