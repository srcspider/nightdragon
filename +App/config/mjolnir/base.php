<?php

	// this is a special configuration file that grabs the current configuration
	// from the public www director config file, if available, or uses a generic
	// one otherwise

if (\defined('PUBDIR'))
{
	return include PUBDIR.'config'.EXT;
}
else # PUBDIR not defined
{
	$rootpath = \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'../../..');

	if (\file_exists($rootpath.'/privatefiles'))
	{
		$privatepath = \trim(\file_get_contents($rootpath.'/privatefiles'), "\n\r ");

		// use specified private path
		return array
			(
				// assume private files are just outside the project; customize
				// this to actual path if not valid
				'private.files' => \realpath($privatepath),
			);
	}
	else # privatefiles
	{
		// probably cli or something else
		return array
			(
				// assume private files are just outside the project; customize
				// this to actual path if not valid
				'private.files' => \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'../../../..')
					. DIRECTORY_SEPARATOR.'mjolnir.private'.DIRECTORY_SEPARATOR,
			);
	}
}