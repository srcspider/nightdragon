<?php 

if (PHP_VERSION_ID < 50400)
{
	header("HTTP/1.0 500 Internal Server Error");
	echo 'Required PHP version not satisfied. Terminating.';
	exit(1);
}

// define PUBDIR
\define('PUBDIR', \realpath(\dirname(\dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..')).DIRECTORY_SEPARATOR);

$system_config = include '../config.php';

require $system_config['system.dir'].'setup.php';

# ---- Theme Files ----------------------------------------------------------- #

$theme_resources = function ($relay, $target)
	{
		\app\Layer::stack
			(
				\app\Layer_HTTP::instance(),
				\app\Layer_Theme::instance()
					->relay_config($relay)
			);
	};

\app\Relay::process('\ibidem\theme\Layer_Theme::style', $theme_resources);
\app\Relay::process('\ibidem\theme\Layer_Theme::script-map', $theme_resources);
\app\Relay::process('\ibidem\theme\Layer_Theme::script-src', $theme_resources);
\app\Relay::process('\ibidem\theme\Layer_Theme::script', $theme_resources);
\app\Relay::process('\ibidem\theme\Layer_Theme::resource', $theme_resources);


# ---- Fallback -------------------------------------------------------------- #

// we failed relays
\header("HTTP/1.0 404 Not Found");
echo '404 - Media Not Found';
exit(1);

