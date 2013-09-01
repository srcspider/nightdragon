<?php namespace app;

// these functions can't be place in the framework since this entire
// folder has to be completely independent

\defined('MJ_APP_VERSION') or \define('MJ_APP_VERSION', '0.0');

// error reporting may duplicate the definition
if ( ! \function_exists('\app\index'))
{
	// we use an in-file function so ruby can process the file
	function index()
	{
		$args = \func_get_args();

		$result = [];
		foreach ($args as $array)
		{
			foreach ($array as $key => $item)
			{
				if ( ! \in_array($item, $result))
				{
					if (\is_int($key))
					{
						$result[] = $item;
					}
					else # named key
					{
						$result[$key] = $item;
					}
				}
			}
		}

		return $result;
	}
}
