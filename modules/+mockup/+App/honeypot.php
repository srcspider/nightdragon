<?php namespace app;

// This is an IDE honeypot. It tells IDEs the class hirarchy, but otherwise has
// no effect on your application. :)

// HowTo: order honeypot -n 'mockup'

class Context_Ref extends \mockup\Context_Ref { /** @return \mockup\Context_Ref */ static function instance() { return parent::instance(); } }
