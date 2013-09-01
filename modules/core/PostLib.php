<?php namespace nightdragon\core;

/**
 * @package    nightdragon
 * @category   Core
 * @author     Ibidem Team
 * @copyright  (c) 2013, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class PostLib
{
	use \app\Trait_ModelLib;

	/**
	 * @var string
	 */
	protected static $table = 'posts';

	/**
	 * @var array
	 */
	protected static $fields = array
		(
			'nums' => array
				(
					'id',
				),
			'strs' => array
				(
					'title',
					'body',
				// dates
					'posttime',
				),
			'bools' => array
				(
					'posted',
				),
		);

	/**
	 * @var array
	 */
	protected static $fieldformat = array
		(
			'posttime' => 'datetime',
		);

	/**
	 * @return \mjolnir\types\Validator
	 */
	static function check(array $fields, $context = null)
	{
		return \app\Validator::instance($fields)
			->rule(['title', 'body', 'posttime'], 'not_empty');
	}

	/**
	 * ...
	 */
	static function process($fields)
	{
		$fieldlist = static::fieldlist();
		static::inserter($fields, $fieldlist['strs'], $fieldlist['bools'], \array_diff($fieldlist['nums'], ['id']))->run();
		static::clear_cache();
	}

	/**
	 * ...
	 */
	static function update_process($id, $fields)
	{
		$fieldlist = static::fieldlist();
		static::updater($id, $fields, $fieldlist['strs'], $fieldlist['bools'], \array_diff($fieldlist['nums'], ['id']))->run();
		static::clear_cache();
	}

} # class
