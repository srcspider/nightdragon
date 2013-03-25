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
		return \app\ThemeView::fortarget($this->target(), $this->theme())
			->pass('context', $this)
			->pass('control', $this)
			->pass('lang', $this->lang());
	}

	// ------------------------------------------------------------------------
	// Session

	/**
	 * @return \mjolnir\types\Lang
	 */
	function lang()
	{
		static $lang = null;

		if ($lang === null)
		{
			$lang = \app\Lang::instance()
				->addlibrary('demo:general')
				->addlibrary('demo:'.static::dashsingular());
		}

		return $lang;
	}

	/**
	 * @return \mjolnir\types\Theme
	 */
	function theme()
	{
		return \app\Theme::instance();
	}

	/**
	 * @return string
	 */
	function target()
	{
		return $this->singular();
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
