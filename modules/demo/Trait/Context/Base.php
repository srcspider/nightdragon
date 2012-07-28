<?php namespace demo;

/**
 * @package    demo
 * @category   Trait
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Context_Base
{
	function site_title()
	{
		return \app\CFS::config('ibidem/base')['site:title'];
	}

} # trait
