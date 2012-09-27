/**
 * xLoad (read as: "Cross-Load") load pages with out going though a page load.
 *
 * @version 1.0
 * @license https://github.com/ibidem/ibidem/blob/master/LICENSE.md (BSD-2)
 */
;(function ($) {

	// enable stict mode
	"use strict";

	$.jshadow({

		'name': 'xload',

		'wrapper': '[data-xload-scope]',

		'defaults': {
			'api-target': 'a[href]',
			'destination': '#page'
		},

		'routines': {
			// empty
		},

		'action': function (event, conf, wrapper, self) {
			var $target, href;
			
			event.preventDefault();
			
			$target = $(this);
			href = $target.attr('href');
			
			$(conf.destination).load(href + ' ' + conf.destination + ' > *', function () {
				// reatach events
				history.pushState(null, '', href);
				$(conf.destination).jshadow();
			});
		}

	});

}(window.jQuery));
