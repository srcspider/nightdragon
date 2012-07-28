<?php namespace demo;

/**
 * @package    demo
 * @category   Controller
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Controller_Frontend extends \app\Controller_HTTP
{
	function action_index()
	{
		$view = \app\ThemeView::instance()
			->target('frontend')
			->layer($this->layer)
			->context(\app\Context_Frontend::instance())
			->control($this);
		
		$this->body($view->render());
	}

} # class
