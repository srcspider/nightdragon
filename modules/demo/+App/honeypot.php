<?php namespace app;

// This is an IDE honeypot. It tells IDEs the class hirarchy, but otherwise has
// no effect on your application. :)

// HowTo: order honeypot -n 'demo\core'

class Controller_Login extends \demo\core\Controller_Login { /** @return \demo\core\Controller_Login */ static function instance() { return parent::instance(); } }
class Schematic_Mjolnir_Access_Demo extends \demo\core\Schematic_Mjolnir_Access_Demo { /** @return \demo\core\Schematic_Mjolnir_Access_Demo */ static function instance() { return parent::instance(); } }
trait Trait_Controller_DemoBase { use \demo\core\Trait_Controller_DemoBase; }
