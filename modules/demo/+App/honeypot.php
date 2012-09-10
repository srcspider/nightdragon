<?php namespace app;

// This is an IDE honeypot. It tells IDEs the class hirarchy, but otherwise has
// no effect on your application. :)

// HowTo: order honeypot -n 'demo\core'

class Context_About extends \demo\core\Context_About { /** @return \demo\core\Context_About */ static function instance() { return parent::instance(); } }
class Context_Demo extends \demo\core\Context_Demo { /** @return \demo\core\Context_Demo */ static function instance() { return parent::instance(); } }
class Context_Quickstart extends \demo\core\Context_Quickstart { /** @return \demo\core\Context_Quickstart */ static function instance() { return parent::instance(); } }
class Controller_About extends \demo\core\Controller_About { /** @return \demo\core\Controller_About */ static function instance() { return parent::instance(); } }
class Controller_Demo extends \demo\core\Controller_Demo { /** @return \demo\core\Controller_Demo */ static function instance() { return parent::instance(); } }
class Controller_Quickstart extends \demo\core\Controller_Quickstart { /** @return \demo\core\Controller_Quickstart */ static function instance() { return parent::instance(); } }
class Schematic_Demo_Example_Base extends \demo\core\Schematic_Demo_Example_Base { /** @return \demo\core\Schematic_Demo_Example_Base */ static function instance() { return parent::instance(); } }
trait Trait_Context_DemoBase { use \demo\core\Trait_Context_DemoBase; }
trait Trait_Controller_DemoBase { use \demo\core\Trait_Controller_DemoBase; }
