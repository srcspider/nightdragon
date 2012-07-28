<?php 

if (PHP_VERSION_ID < 50400)
{
	echo 'Required PHP version not satisfied. Terminating.';
	die;
}

\define('PUBDIR', \realpath(\dirname(__FILE__)).DIRECTORY_SEPARATOR);

$system_config = include 'config.php';

require $system_config['system.dir'].'setup.php';

// go though all relays
\app\Relay::check_all();

// we failed relays
\header("HTTP/1.0 404 Not Found");
echo '404 - Not Found';
exit(1);
