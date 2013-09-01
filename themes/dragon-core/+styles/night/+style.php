<?php require 'library/extras.php';

return array
	(
		'version' => '1.0.0',
		'root' => 'root/',
		'sources' => 'src/',
		'mode' => 'complete',

	# Complete mode

		'complete-mapping' => array
			(
				'circle'
			),

	# Targetted mode

		// common files used in targeted mapping
		'targeted-common' => array
			(
				// empty
			),

		// mapping targets to files; if a target is not mapped it won't have
		// any style associated
		'targeted-mapping' => array
			(
				// empty
			),

	); # config
