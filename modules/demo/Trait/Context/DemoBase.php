<?php namespace demo\core;

/**
 * @package    demo
 * @category   Trait
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Context_DemoBase
{
	function site_title()
	{
		return \app\CFS::config('ibidem/base')['site:title'];
	}
	
	function site_url()
	{
		return \app\URL::href('demo');
	}
	
	function navlist()
	{
		return array
			(
				[
					'title' => 'About Mjölnir',
					'url' => \app\URL::href('about'),
				],
			);
	}

} # trait
