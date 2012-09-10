<?php return array
	(
		'autofills' => array
			(
				'#^Context_.*$#' => \app\View::instance('demo/autofills/Context')->render(),
			),
	
	);