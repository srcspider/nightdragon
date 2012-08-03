<?php \defined('PUBDIR') or die;

return array
	(
		'maintanence' => array
			(
				'enabled' => true,
				'passcode' => 'thereisnocowlevel', # allows you to bypass the 503
			
				// specify a retry so crawlers don't miss-mark the site
				'retry-after' => null, # format: Sat, 8 Oct 2011 18:27:00 GMT
			),
	
		'domain' => 'your.domain.tld',
		'path' => '/', # must end and start with a /
	
		'lang' => 'en-us',
	
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