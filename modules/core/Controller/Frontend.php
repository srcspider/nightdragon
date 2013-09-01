<?php namespace nightdragon\core;

/**
 * @package    nightdragon
 * @category   Controller
 * @author     Ibidem Team
 * @copyright  (c) 2013, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Controller_Frontend extends \app\Controller_Base
{
	use \app\Trait_NightdragonCommon;

	/** @var array */
	static $grammar = ['frontend'];

	/**
	 * @return array
	 */
	function posts($page)
	{
		return \app\PostLib::entries
			(
				$page, $this->pagelimit(), 0,
				[
					'posttime' => 'desc'
				],
				$this->publicpost_requirements()
			);
	}

	/**
	 * @return int
	 */
	function pagelimit()
	{
		return 30;
	}

	/**
	 * @return int
	 */
	function postcount()
	{
		return \app\PostLib::count($this->publicpost_requirements());
	}

	/**
	 * @return \mjonir\types\Pager
	 */
	function pager()
	{
		return \app\Pager::instance($this->postcount())
			->pagelimit_is($this->pagelimit());
	}

	/**
	 * @return array
	 */
	protected function publicpost_requirements()
	{
		return array
			(
				'posted' => true,
				'posttime' => [ '<=' => \date('Y-m-d H:i:s') ],
			);
	}

} # class
