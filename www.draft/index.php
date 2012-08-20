<?php

if (PHP_VERSION_ID < 50400)
{
	header("HTTP/1.0 500 Internal Server Error");
	echo 'Required PHP version not satisfied.';
	exit(1);
}

// load the configuration
$system_config = include 'config.php';

// require core files
require_once $system_config['system.dir'].'mjolnir.php';

// run as http based application
\app\Mjolnir::www($system_config);
