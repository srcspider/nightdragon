<?php

	// this is a special configuration file that grabs the current configuration
	// from the public www director config file, if available, or uses a generic
	// one otherwise

if (\defined('PUBDIR'))
{
	return include PUBDIR.'config'.EXT;
}
else # PUBDIR not defined
{
	// probably cli or something else
	return array
		(
			// empty (assume system defaults)
		);
}