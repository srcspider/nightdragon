<?php namespace demo;

/**
 * @package    demo
 * @category   Controller
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Controller_Frontend extends \app\Controller_Web
{
	protected static $target = 'frontend';

	// or you can write the explicit version
	
//	function action_index()
//	{
//		$view = \app\ThemeView::instance()
//			->target('frontend')
//			->layer($this->layer)
//			->context(\app\Context_Frontend::instance())
//			->control($this);
//		
//		$this->body($view->render());
//	}

} # class
