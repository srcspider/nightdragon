<?php namespace app;


# ---- Basic settings -------------------------------------------------------- #

// define handy shorthand :)
$ds = DIRECTORY_SEPARATOR;

// set the full path to the docroot
\define('DOCROOT', \realpath(\dirname(__FILE__)).$ds);

$cfspath = DOCROOT.'vendor'.$ds.'mjolnir'.$ds.'cfs'.$ds.'+App'.$ds;

// we load the default environment; if you want custom APPPATH, MODPATH, PLGPATH
// simply define them before this statement, they will not be redefined.
require $cfspath.'default.mjolnir.php';


# ---- Modules --------------------------------------------------------------- #

$env_config = include 'environment'.EXT;

// setup the modules
CFS::modules($env_config['modules']);

// allow application to store and overwrite config files, routes, etc;
// everything except classes. You should always define your classes in
// appropriate modules in the MODPATH
CFS::add_frontpaths([APPPATH]);

// attempt to load private configuration
if (\defined('PUBDIR'))
{
	$pubdir_config = include PUBDIR.'config'.EXT;
	if (isset($pubdir_config['private.files']) && \file_exists($pubdir_config['private.files']))
	{
		\app\CFS::add_frontpaths([$pubdir_config['private.files']]);
	}
}
else # console or other
{
	$base_config = include APPPATH.'config/mjolnir/base'.EXT;
	if (\file_exists($base_config['private.files']))
	{
		\app\CFS::add_frontpaths([$base_config['private.files']]);
	}
}

// you are not suppose to overwrite namespaces and abstracts; that's a misuse.
// hence it makes no sense to search for them in \app\Class calls. Namespaces
// should always be explicit
CFS::add_namespaces($env_config['namespaces']);

$base_config = \app\CFS::config('mjolnir/base');

// see: http://php.net/timezones
\date_default_timezone_set($base_config['timezone']);

// see: http://php.net/setlocale
\setlocale(LC_ALL, $base_config['locale.lang'].$base_config['charset']);

# ---- Bridges --------------------------------------------------------------- #
/*
\define('SYSPATH', true); # kohana3 file-safeguard requirement

// setup the bridges
\mjolnir\cfs\Kohana3_Bridge::bridges
	(
		array
		(
			PLGPATH.'kohana3'.$ds.'core' => array
				(
					'namespace' => 'kohana3\core',
					'prefix' => 'kohana',
				),
		)
	);

// include the paths in the CFS (note: this is not the same as adding modules)
CFS::add_backpaths(\mjolnir\cfs\Kohana3_Bridge::paths());

// register the autoloader
\spl_autoload_register( array('\mjolnir\cfs\Kohana3_Bridge', 'load_class') );
*/


# ---- Composer Autoloaders -------------------------------------------------- #

if (\file_exists(PLGPATH.$ds.'autoload'.EXT))
{
	// composer setup
	require PLGPATH.$ds.'autoload'.EXT;
}


// done; cleaning up
unset($ds, $cfspath);