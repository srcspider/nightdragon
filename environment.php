<?php return array
	(
		'modules' => array
			(
				// project modules
				MODPATH.'demo' => 'demo\core',

				// development modules
				MODPATH.'+mockup' => 'mockup',

				// library legacy code
//				PLGPATH.'mjolnir/legacy' => 'mjolnir\legacy',

				// mjolnir modules
				PLGPATH.'mjolnir/access' => 'mjolnir\access',
				PLGPATH.'mjolnir/base' => 'mjolnir\base',
				PLGPATH.'mjolnir/html' => 'mjolnir\html',
				PLGPATH.'mjolnir/database' => 'mjolnir\database',
				PLGPATH.'mjolnir/cache' => 'mjolnir\cache',
				PLGPATH.'mjolnir/theme' => 'mjolnir\theme',
				PLGPATH.'mjolnir/backend' => 'mjolnir\backend',
				PLGPATH.'mjolnir/schematics' => 'mjolnir\schematics',
				PLGPATH.'mjolnir/cfs' => 'mjolnir\cfs',
				PLGPATH.'mjolnir/librarian' => 'mjolnir\librarian',
				PLGPATH.'mjolnir/testing' => 'mjolnir\testing',
			),

		'namespaces' => array
			(
				// libraries accessed via explicit calls only
				'mjolnir\types' => PLGPATH.'mjolnir/types',
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
