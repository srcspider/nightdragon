<?php \defined('PUBDIR') or die;

// this file can be accessed in your app as the 'ibidem/base' configuration
return array
	(
		// required information
		'domain' => 'your.domain.tld',
		'path' => '/', # must END and START with a /
	
		// turn on maintainence mode when performing long running modifications
		// in a live environment; you can customize the placeholder downtime.php
		// page for customized maintainence message and view
		'maintanence' => array
			(
				'enabled' => true,
			
				// specify a retry so crawlers don't miss-mark the site
				'retry-after' => null, # format: Sat, 8 Oct 2011 18:27:00 GMT
			
				// allows you to bypass the block
				'passcode' => 'thereisnocowlevel', 
			),
	
		// language
		'lang' => 'en-us',
	
		// turns on/off caching globally
		'caching' => true,
	
		// path on system to private files (password, etc), these act as any 
		// typical file-only module; you may have config files, etc
		'private.files' => \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'..')
			. DIRECTORY_SEPARATOR.'ibidem.private'.DIRECTORY_SEPARATOR,

	
		// the following points to the parent directory of this directory, so 
		// that this template may be droped easily in a www directory for quick 
		// and dirty testing work
		
		// in production change this to a path and then copy/rename (only) the 
		// www.draft folder (and/or it's contents) to your server with this path 
		// pointing to your project's root somewhere outside the public web 
		// document's root, so that your files may be safe from prying eyes
		'system.dir' => \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'..')
							.DIRECTORY_SEPARATOR,
	);