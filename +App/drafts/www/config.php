<?php

if (\realpath(__FILE__) == \realpath($_SERVER['SCRIPT_FILENAME']))
{
	header("HTTP/1.0 404 Not Found");
	exit(1);
}

// define the public files directory
if ( ! \defined('PUBDIR'))
{
	\define('PUBDIR', \realpath(\dirname(__FILE__)).DIRECTORY_SEPARATOR);
}

return array
	(
		// required information
		'domain' => 'your.domain.tld',
		'path' => '/', # must end and start with a /

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
	
		// additional information required by various processes
		'system.info' => array
			(
				// this email will be used when sending various system generated
				// emails; for the purpose of feedback and troubleshooting info
				'contact.email' => 'contact@your.domain.tld',
			),

		// language
		'lang' => 'en-us',

		// turns on/off caching globally
		'caching' => true,

		// turns on/off development mode
		'development' => false,

		// specifies the mockup namespace
		'mockup-ns' => 'mockup',

		// static mode: theme resource files will be written to disk source maps
		// will not be available; you are free to rewrite headers if you really
		// really want them with this mode enabled
		'static-theme' => false,

		// disables certain features
		'disable' => array
			(
				// true = disabled, false = allowed
				'closure-mode' => false,
			),

		// path on system to private files (password, etc), these act as any
		// typical file-only module
		'private.files' => \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'..')
			. DIRECTORY_SEPARATOR.'mjolnir.private'.DIRECTORY_SEPARATOR,


		// the following points to the parent directory of this directory, so
		// that this template may be droped easily in a www directory for quick
		// and dirty testing work

		// in production change this to a path and then copy/rename (only) the
		// www.draft folder (and/or it's contents) to your server with this path
		// pointing to your project's root somewhere outside the public web
		// document's root, so that your files may be safe from prying eyes
		'system.dir' => \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'..')
			. DIRECTORY_SEPARATOR,
	);