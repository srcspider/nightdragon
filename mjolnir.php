<?php namespace app;

#
# The following has been condensed to be as short as possible and updatable via
# the system modules. You may customize it to suit your own needs. If you don't
# want to customize your projects structure, you can just forget this file even
# exists.
#

// gurantee EXT is defined
\defined('EXT') or \define('EXT', '.php');

// set the full path to the docroot
\define('DOCROOT', \realpath(\dirname(__FILE__)).'/');

$cfspath_files = DOCROOT.'vendor/mjolnir/cfs/+App/';

// fail gracefully when libraries are missing
if ( ! \file_exists($cfspath_files))
{
	if (\defined('PUBDIR'))
	{
		$pubdir_config = include PUBDIR.'config'.EXT;
		if ($pubdir_config['development'])
		{
			echo 'Missing system libraries. '.PHP_EOL;
			echo 'Please install by running "install-vendor" in ['.$pubdir_config['system.dir'].']';
		}
		else # user error
		{
			include PUBDIR.'outage'.EXT;
		}
	}
	else # potentially console app
	{
		echo 'Missing system libraries. Terminating.'.PHP_EOL;
	}
	exit(1);
}

// we load the default environment; if you want custom APPPATH, MODPATH, PLGPATH
// simply define them before this statement, they will not be redefined.
require $cfspath_files.'default.mjolnir.php';

#
# See [mjolnir/cfs/+App/bridges] for bridge declaration help
#

// cleanup
unset($cfspath_files);
