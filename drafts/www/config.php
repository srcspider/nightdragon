<?php return array
	(
		# Important Settings
		# ---------------------------------------------------------------------

		// where are your passswords and secret keys configurations located?
		'key.path' => null, # absolute path
		// where are the system files located?
		'sys.path' => null, # absolute path

		// are you in a development environment?
		'development' => false,

		// what is the domain of your site? eg. www.example.com, example.com
		'domain' => 'your.domain.tld',
		// is your site in a directory on the server?
		'path' => '/', # must end and start with a /

		// additional information required by various processes
		'system' => array
			(
				'title' => 'Untitled',
				'quote' => '',

				// general purpose email
				'email' => 'contact@your.domain.tld',
			),

		# Performance Settings
		# ---------------------------------------------------------------------

		// do you want to use caching?
		'caching' => true,

		// do you wish for rarely changed assets to be saved to disk?
		'static-assets' => false, # tip: keep it false in development


		# Optional Settings
		# ---------------------------------------------------------------------

		// what is the default protocol you want to use inside the application?
		'protocol' => 'http://', # eg. //, http://, https://
		// what is the timezone you want to use?
		'timezone' => 'Europe/London',
		// what is the default charaset you want to use?
		'charset' => 'UTF8',
		// what is the default language?
		'lang' => 'en-US',

		// logging system settings
		'logging' => array
			(
				// prevent the same message from getting logged multiple times?
				'duplication' => false, # [!!] does not effect dev logs

				// generate folder-based message hirarchies? the hirarchies will
				// be based on the message type, ie. 404, Notice, Hacking, etc
				'replication' => false,

				// the devlogs store development friendly messages and are used
				// during development when the majority of errors are easily
				// identified or for outputing debug information
				'devlogs' => true,

				// you may ignore certain types of log errors if you already
				// have an alternative system in place that catches them and
				// reports them to you; one such case are 404 errors typically
				'exclude' => array
					(
						// no exceptions
					),

				// sometimes you may be recieving errors from underlying or
				// proxy systems outside your control. Often these are caused
				// by broken client side javascript, that makes its way to the
				// the server, insert any regular expression bellow if the main
				// message matches the pattern it will be ignored
				'filter' => array
					(
						// no regex patterns
					),
			),

		// turn on maintainence mode when performing long running modifications
		// in a live environment; you can customize the placeholder
		// err/downtime.php page for a customized maintainence message and view
		'maintanence' => array
			(
				'enabled' => false,

				// specify a retry so crawlers don't miss-mark the site
				'retry-after' => null, # format: Sat, 8 Oct 2011 18:27:00 GMT

				// allows you to bypass the block
				'passcode' => 'opensesame',
			),

		// should index.php route to media/ thumbs/ etc?
		'hard-routing' => true,

		// if you are interfacing with borken garbage code that barely runs
		// as-is you may wish to adjust the following setting; leave as-is in
		// every other scenario or undefined behaviour may happen
		'error-reporting' => -1,

	); # config
