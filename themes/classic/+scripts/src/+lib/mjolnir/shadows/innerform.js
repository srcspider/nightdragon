/**
 * Similar to xload only attaches itself to forms instead.
 * 
 * Assumes very plain forms are used.
 */
;(function ($, undefined) {

	// enable stict mode
	"use strict";

	$.jshadow({

		'name': 'innerform',

		'wrapper': '[data-innerform]',

		'defaults': {
			'api-target': '[data-innerform-action]'
		},

		'routines': {
			'refresh': function (conf, wrapper, self) {
				// empty
			}
		},

		'init': function (conf, wrapper, self) {

			var $targets = $.jshadow.children(conf, wrapper, self, conf['api-target']);

			$targets.each(function () {
				var $target = $(this),
					$form = null,
					$scope = $target.closest('[data-innerform]');
				
				// retrieve the correct form
				if ($target.attr('form') === undefined) {
					$form = $target.closest('form');
				}
				else { // have form attribute
					$form = $('#'+$target.attr('form'));
				}
				
				if ($form === null) {
					console.log('innerform.shadow: failed to locate form for ', $target);
					return;
				}
				
				$target.on('click', function (event) {
					event.preventDefault();
					event.stopPropagation();
					
					// begin loading
					$.xhrPool.abortAll();
					if ($scope.attr('data-loading') !== 'true') {
						$scope.showLoading();
						$scope.attr('data-loading', 'true');
					}
					
					// dismiss all modals
					$('[data-dismiss="modal"]', $scope).trigger('click');
					
					if (mj === undefined || mj.browser.ie) {
						// account for use of form attribute
						$('[form="' + $form.attr('id') + '"]').not('form [form]').each(function () {
							var $element = $(this),
								name = $element.attr('name'),
								$duplicates = $('[name="'+name+'"]', $form);
								
							$duplicates.remove();
							
							$form.prepend($element);
						});
					}

					$.ajax({
						url: $form.attr('action'),
						type: 'POST',
						data: $form.serialize(),
						success: function(data) {
							var destination = $scope.attr('data-innerform'),
								href = window.location;
								
							$('#'+destination).load(href + ' #' + destination + ' > *', function (response, status, xhr) {
								if (status == 'error') {
									console.log('Error: ' + xhr.status + ' ' + xhr.statusText);
									return;
								}

								// hide loading
								$scope.hideLoading();
								$scope.attr('data-loading', 'false');

								$('#'+destination).jshadow();
							});
							
						}
					});
				});
			});

			self.api.refresh();
		},

		'action': function (event, conf, wrapper, self) {
			self.api.refresh();
		}

	});

}(window.jQuery));
