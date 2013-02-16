<?php namespace demo\core;

/**
 * @package    demo
 * @category   Demo
 * @author     Ibidem Team
 * @copyright  (c) 2013, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Controller_DemoBase
{
	// ------------------------------------------------------------------------
	// Actions

	/**
	 * @return \mjolnir\types\Renderable
	 */
	function public_index()
	{
		return \app\ThemeView::fortarget(static::singular())
			->pass('control', $this)
			->pass('errors', []);
	}

	// ------------------------------------------------------------------------
	// Helpers

	/**
	 * @return string
	 */
	function action($action)
	{
		return \app\URL::href
			(
				static::singular().'.public',
				[
					'action' => $action
				]
			);
	}

} # trait
