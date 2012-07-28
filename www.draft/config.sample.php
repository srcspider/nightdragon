<?php \defined('PUBDIR') or die;

return array
	(
		'domain' => 'your.domain.tld',
		'path' => '/', # must end and start with a /
	
		'lang' => 'en-us',
		'system.dir' => \realpath(\realpath(__DIR__).DIRECTORY_SEPARATOR.'..')
							.DIRECTORY_SEPARATOR,
	);