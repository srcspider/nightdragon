<?php namespace demo\core;

/**
 * @package    demo
 * @category   Controller
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Controller_About extends \app\Controller_Web
{
	use \app\Trait_Controller_DemoBase;
	
	/**
	 * @var string  target for auto-resolving
	 */
	protected static $target = 'about';
	
} # class
