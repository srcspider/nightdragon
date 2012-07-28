<?php namespace demo;

/**
 * @package    demo
 * @category   Context
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Context_Frontend extends \app\Instantiatable
{
	use \app\Trait_Context_Base;

	function message()
	{
		return 'hello, world';
	}	
	
} # class
