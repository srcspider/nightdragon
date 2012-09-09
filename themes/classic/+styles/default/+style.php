<?php return array
	(
		'version' => '1.0', # used in cache busting; update as necesary

		// set the style.root to '' (empty string) when writing (entirely) just
		// plain old css files; and not compiling sass scripts, etc
		'style.root' => 'root'.DIRECTORY_SEPARATOR,

		// common files
		'common' => array
			(
				'base',
				'unsorted'
			),
	
		// mapping targets to files; if a target is not mapped it won't have
		// any style associated
		'targets' => array
			(
				'frontend' => array
					(
						// twitter bootstrap
						'+lib/twitter/bootstrap',
						'+lib/twitter/responsive',
					),
			
				'about' => array
					(
						// twitter bootstrap
						'+lib/twitter/bootstrap',
						'+lib/twitter/responsive',
					
						// SyntaxHighlighter
						'+vendor/SyntaxHighlighter/shCore',
						'+vendor/SyntaxHighlighter/shCoreDefault',
						'+vendor/SyntaxHighlighter/shThemeRDark',
					),
			
			//// Style Reference ///////////////////////////////////////////////
			
				'ref' => array # should be called only via mockup/
					(
						// SyntaxHighlighter
						'+vendor/SyntaxHighlighter/shCore',
						'+vendor/SyntaxHighlighter/shThemeRDark',
					
						// twitter bootstrap
						'+lib/twitter/bootstrap',
						'+lib/twitter/responsive',
				
						// jquery ui
						'+lib/jquery/ui/jquery.ui.accordion',
						'+lib/jquery/ui/jquery.ui.autocomplete',
						'+lib/jquery/ui/jquery.ui.button',
						'+lib/jquery/ui/jquery.ui.core',
						'+lib/jquery/ui/jquery.ui.datepicker',
						'+lib/jquery/ui/jquery.ui.dialog',
						'+lib/jquery/ui/jquery.ui.progressbar',
						'+lib/jquery/ui/jquery.ui.resizable',
						'+lib/jquery/ui/jquery.ui.selectable',
						'+lib/jquery/ui/jquery.ui.slider',
						'+lib/jquery/ui/jquery.ui.tabs',
						'+lib/jquery/ui/jquery.ui.theme',					
					),
			
			//// Exceptions ////////////////////////////////////////////////////
			
				'exception-NotFound' => array
					(
						'errors/base'
					),
				'exception-NotAllowed' => array
					(
						'errors/base'
					),
				'exception-NotApplicable' => array
					(
						'errors/base'
					),
				'exception-Unknown' => array
					(
						'errors/base'
					),
			),
	);

