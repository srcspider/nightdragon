<?php namespace app;

	$syspath = \app\Env::key('sys.path');

return array
	(
		'demo:general'   => "{$syspath}language/en-US/general",
		'demo:dashboard' => "{$syspath}language/en-US/pages/dashboard",
		'demo:home'      => "{$syspath}language/en-US/pages/home",
		'demo:login'     => "{$syspath}language/en-US/pages/login",

	); # config
