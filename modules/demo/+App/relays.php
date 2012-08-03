<?php namespace app;

// The following is a sneaky way of specifying relays so we don't have to edit 
// this file each time we add a new one; you can add handling for types you need

$mvc_stack = function ($relay, $target)
	{
		\app\Layer::stack
			(
				\app\Layer_Access::instance()
					->relay_config($relay)
					->target($target),
				\app\Layer_HTTP::instance(),
				\app\Layer_MVC::instance()
					->relay_config($relay)
			);
	};

// we read the configuration inside this module
$relay_config = include 'config/ibidem/relays'.EXT;

foreach ($relay_config as $key => $relay)
{
	// is this relay defined here?
	if (isset($relay['route']))
	{
		\app\Relay::process($key, $mvc_stack);
	}
}
