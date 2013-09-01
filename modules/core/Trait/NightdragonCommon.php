<?php namespace nightdragon\core;

/**
 * @package    nightdragon
 * @category   Trait
 * @author     Ibidem Team
 * @copyright  (c) 2013, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_NightdragonCommon
{
	/**
	 * @return \mjolnir\types\Renderable
	 */
	function public_index()
	{
		$this->channel()
			->set('title', 'The Source Spider')
			->set('description', 'A Humble Tech Blog');

		return $this->theme()->themeview(static::dashsingular())
			->pass('control', $this)
			->pass('context', $this);
	}

	/**
	 * @return \mjolnir\types\Theme
	 */
	protected function theme()
	{
		return \app\Theme::instance();
	}

} # trait
