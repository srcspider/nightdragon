<?php namespace app;

	// load the configuration
	$system_config = include '../config.php';

	# Handle Request
	# -------------------------------------------------------------------------

	// DO NOT use this constant for anything more then crude error checking. It
	// is not equivalent to Env::key('www.path') under all circumstances
	defined('MJOLNIR_STARTDIR') or \define('MJOLNIR_STARTDIR', \realpath(\dirname(__FILE__).'/../').'/');

	// require core files
	require_once $system_config['system.dir'].'mjolnir.php';

	// run as theme file request
	Mjolnir::resource($system_config);
