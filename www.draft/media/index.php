<?php 

if (PHP_VERSION_ID < 50400)
{
	header("HTTP/1.0 500 Internal Server Error");
	echo 'Required PHP version not satisfied.';
	exit(1);
}

// load the configuration
$system_config = include '../config.php';

// require core files
require $system_config['system.dir'].'setup.php';

// run as theme file request
\app\Mjolnir::themes($system_config);
