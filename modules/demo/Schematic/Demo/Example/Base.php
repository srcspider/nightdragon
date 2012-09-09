<?php namespace demo\core;

/**
 * @package    demo
 * @category   Schematic
 * @author     Ibidem
 * @copyright  (c) 2012, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
class Schematic_Demo_Example_Base extends \app\Schematic_Base
{
	function down()
	{
		\app\Schematic::destroy
			(
//				\app\Model_Example::table()
			);
	}
	
	function up()
	{
//		\app\Schematic::table
//			(
//				\app\Model_Example::table(),
//				'
//					`id`    :key_primary,
//					`user`  :key_foreign,
//					`title` :title,
//					
//					PRIMARY KEY (`id`)
//				'
//			);
	}
	
	function move()
	{
		// empty
	}
	
	function bind()
	{
//		\app\Schematic::constraints
//			(
//				[
//					\app\Model_Example::table() => array
//						(
//							'user' => [\app\Model_User::table(), 'CASCADE', 'CASCADE'],
//						),
//				]
//			);
	}
	
	function build()
	{
		// empty
	}

} # class
