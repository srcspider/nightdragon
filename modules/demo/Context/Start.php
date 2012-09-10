<?php namespace demo\core;

/**
 * @package    demo
 * @category   Context
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Context_Start extends \app\Instantiatable
{
	use \app\Trait_Context_DemoBase;

	/**
	 * @return string path to mockup
	 */
	function mockup_example()
	{
		return \app\URL::href('\mjolnir\theme\mockup', ['target' => 'start']);
	}

} # class
