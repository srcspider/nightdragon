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
		// turns on/off development mode
		'development' => false,

		// required information
		'domain' => 'your.domain.tld',
		'path' => '/', # must end and start with a /

		// defaults
		'protocol' => 'http://', # eg. //, http://, https://
		'timezone' => 'Europe/London',
		'charset' => 'UTF8',
		'lang' => 'en-US',

		// turns on/off caching globally
		'caching' => true,

		// logging system settings
		'logging' => array
			(
				// turning duplication will cause the logging system to relog
				// re-occuring errors based on their main exception message hash
				// with the option off only the first occurance will be recorded
				'duplication' => false, # [!!] does not apply to the short.log

				// the logging system will replicate all errors based on their
				// level key. So "Notice" errors will get replicated into Notice
				// Hacking will get replicated into Hacking. This can be very
				// efficient way of managing your log. For integrity reasons the
				// master log will still hold the errors regardless
				'replication' => false,

				// the short.log or devlog stores a 1-line version of the error
				// this is very useful in development where most errors can be
				// easily identified in a few words and don't need to be stored
				'short.log' => true,

				// you may ignore certain types of log errors if you already
				// an alternative system in place that catches them and reports
				// them to you; one such case are 404 errors
				'exclude' => [ '404' ],

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
		// in a live environment; you can customize the placeholder downtime.php
		// page for customized maintainence message and view
		'maintanence' => array
			(
				'enabled' => true,

				// specify a retry so crawlers don't miss-mark the site
				'retry-after' => null, # format: Sat, 8 Oct 2011 18:27:00 GMT

				// allows you to bypass the block
				'passcode' => 'opensesame',
			),

		// additional information required by various processes
		'system.info' => array
			(
				// this email will be used when sending various system generated
				// emails; for the purpose of feedback and troubleshooting info
				'contact.email' => 'contact@your.domain.tld',
			),

		// specifies the mockup namespace
		'mockup-ns' => 'mockup',

		// static mode: theme resource files will be written to disk source maps
		// will not be available; you are free to rewrite headers if you really
		// really want them with this mode enabled
		'static-theme' => false,

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
