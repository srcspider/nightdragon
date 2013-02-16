<?php return array
	(
		'modules' => array
			(
				// project modules
				MODPATH.'demo' => 'demo\core',

			// ---- Plugins ---------------------------------------------------

				// no plugins

			// ---- Libraries -------------------------------------------------

				// legacy code support
#				VDRPATH.'mjolnir/legacy'     => 'mjolnir\legacy',

				// profiling
				VDRPATH.'mjolnir/profile'    => 'mjolnir\profile',

				// mjolnir modules
				VDRPATH.'mjolnir/access'     => 'mjolnir\access',
				VDRPATH.'mjolnir/base'       => 'mjolnir\base',
				VDRPATH.'mjolnir/foundation' => 'mjolnir\foundation',
				VDRPATH.'mjolnir/html'       => 'mjolnir\html',
				VDRPATH.'mjolnir/database'   => 'mjolnir\database',
				VDRPATH.'mjolnir/cache'      => 'mjolnir\cache',
				VDRPATH.'mjolnir/theme'      => 'mjolnir\theme',
				VDRPATH.'mjolnir/backend'    => 'mjolnir\backend',
				VDRPATH.'mjolnir/cfs'        => 'mjolnir\cfs',
				VDRPATH.'mjolnir/types'      => 'mjolnir\types',
				VDRPATH.'mjolnir/librarian'  => 'mjolnir\librarian',
				VDRPATH.'mjolnir/testing'    => 'mjolnir\testing',
			),

		'namespaces' => array
			(
				// empty
			),

		'themes' => array
			(
				// explicit themes; themes can also just be embeded in modules,
				// in which case there's no need for them to appear here. If you
				// need to package configuration files such as language files
				// you can also create as a file path
				'demo-theme' => DOCROOT.'themes/the-demo/',
			),

	); # config
