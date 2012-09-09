<?php namespace demo\core;

/**
 * @package    demo
 * @category   Library
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Controller_DemoBase
{
	function before()
	{
		parent::before();
		\app\GlobalEvent::fire('webpage:title', 'Mjölnir Demo');
	}

} # trait
