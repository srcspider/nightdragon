/**
 * xLoad (read as: "Cross-Load")
 *
 * Load pages with out going though a page load.
 *
 * @version 1.1
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
			'api-canceler': '[data-xload-exclude]',
			'destination': 'page'
		},

		'binding': function (conf, wrapper, definition) {
			var elements;
			elements = $.jshadow.children(conf, wrapper, definition, conf['api-target'])
				.not(conf['api-canceler']+' *', wrapper);
				
			elements.on(definition.trigger+'.'+definition.name, function (event) {
				$.proxy(definition.action, this)(event, conf, wrapper, definition); 
			});

			// bind events on wrapper
			$.each(definition.routines, function (key, func) {
				wrapper.on(key+'.'+definition.name, func);
			});

			// execute initialization routine if present
			if (typeof definition.init !== 'undefined') {
				definition.init(conf, wrapper, definition);
			}
		},

		'action': function (event, conf, wrapper, self) {
			var $target, href;
			
			event.preventDefault();
			
			$target = $(this);
			href = $target.attr('href');
			
			$('#'+conf.destination).load(href + ' #' + conf.destination + ' > *', function (response, status, xhr) {
				// check for error states
				if (xhr.status != 200) {
					// hard redirect
					window.location = href;
					return;
				}
				
				if (response.match(new RegExp('id=\"'+conf.destination+'\"')) === null) {
					window.location = href;
					return;
				}
				
				// reatach events
				history.pushState(null, '', href);
				$('#'+conf.destination).jshadow();
			});
		}

	});

}(window.jQuery));
