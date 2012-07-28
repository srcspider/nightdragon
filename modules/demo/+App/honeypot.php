<?php namespace app;

// This is an IDE honeypot. It tells IDEs the class hirarchy, but otherwise has
// no effect on your application. :)

// HowTo: minion honeypot -n 'demo'

class Context_Frontend extends \demo\Context_Frontend { /** @return \demo\Context_Frontend */ static function instance() { return parent::instance(); } }
class Controller_Frontend extends \demo\Controller_Frontend { /** @return \demo\Controller_Frontend */ static function instance() { return parent::instance(); } }
trait Trait_Context_Base { use \demo\Trait_Context_Base; }
