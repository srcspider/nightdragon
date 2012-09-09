<?php namespace app;

// This is an IDE honeypot. It tells IDEs the class hirarchy, but otherwise has
// no effect on your application. :)

// HowTo: order honeypot -n 'demo\core'

class Context_About extends \demo\core\Context_About { /** @return \demo\core\Context_About */ static function instance() { return parent::instance(); } }
class Context_Frontend extends \demo\core\Context_Frontend { /** @return \demo\core\Context_Frontend */ static function instance() { return parent::instance(); } }
class Controller_About extends \demo\core\Controller_About { /** @return \demo\core\Controller_About */ static function instance() { return parent::instance(); } }
class Controller_Frontend extends \demo\core\Controller_Frontend { /** @return \demo\core\Controller_Frontend */ static function instance() { return parent::instance(); } }
trait Trait_Context_DemoBase { use \demo\core\Trait_Context_DemoBase; }
trait Trait_Controller_DemoBase { use \demo\core\Trait_Controller_DemoBase; }
