<small>This repository is meant to act as a template. (it's designed to be
generic)</small>

Project Title
=============

Installing dependencies...

<pre>
install-vendor
</pre>

Alternatively, simply open install-vendor and use it as a guide.

(On windows use git bash and have php in your path.)

You will also need to do some basic configuration before things will work:

 * you will need to set the domain in the new `config.php` file 
 * if the project files are located somewhere else then the parent directory to 
the public docs also set the `system.dir` to point to the root of the project
 * if the private files (database configuration, passwords, keys, etc) are 
located anywhere else other then the directory directly above you will need to 
edit the `private.files` variable

If you're using a directory instead of the domain root, you will also need to
set the correct rewrite base in the `drafts/www.apache/.htaccess` file (as an
example) as well as the `path` in the `drafts/www.apache/config.php` file (again
as an example if you're using apache). You should try not to use `.htaccess` 
files but for simplicity this is the default for testing.

The `drafts/www.&lt;server&gt;` directory is where all the files that need to be 
in your public directory are located. Various settings such as configuration 
files for things like sphinx, etc should also go in `drafts/`.

Running Tests
=============

Unit testing is supported via PHPUnit, behaviour testing is supported via behat.

It is recommended...

 * only write either unit tests or behaviour tests
 * you write behaviour tests ;)

<b>To run behaviour tests</b> you simply need to have a `behat.yaml` somewhere 
in your system (it is recomended you place them in `+App/features`). Then run:

<pre>
php order behat --ansi --expand
</pre>

The framework will scan and run the behat command on the `behat.yaml`. Note that
all paths in your `behat.yaml` are relative to the directory where the file is
located. Here is the minimum `behat.yaml` file for the tests to run:

<pre>
default:
  paths:
    features:   '.'
    bootstrap:  './bootstrap'
</pre>

The framework will only scan registered modules for `behat.yaml`s.

You may also imediatly follow the `php order behat` command with 
`--feature "something"` to filter out all features except the ones that match
the pattern.

<b>To run unit tests</b> simply call phpunit on the `phpunit.xml` configuration
file. You may edit the file to suit your needs better. Any class that works with
the Instantiatable class will allow you to replace itself with a mock.

<pre>
phpunit -c phpunit.xml
</pre>

Tests are located in each module's <code>+App/tests</code>. You may place them 
anywhere, but make sure to point phpunit.xml to that location.

Overview
========

`drafts/www.apache/` is a draft of the folder your users should be accessing. 
The `media/static` folder on it's root is where general purpose static content 
should be placed. The `media/index.php` should contain all the dynamic media 
handling. Use `thumbs` for basic thumbnails.

The `drafts/` folder may contain all sorts of other configuration files. For 
example you could have a `www.ngnx/` directory, or a `sphinx.conf` file, or a 
`php.ini` file, etc.

`vendor/` contains external libraries and tools, be it modules or other 
libraries that are not modules themselves but also not module dependent; such as 
the autoloader; vendor distributed binaries located in `vendor/binary` by default

`modules/` contains your project modules. *All your code should go here!*

`+App/` is a special path (non-module) where your log, cache and main 
configuration files are/should-be stored. It can not contain classes, it is not 
an actual module; just an extra path.

`order` is the access point for the overlord command line utility.

`setup.php` is your environment configuration; for the most part it sets
the basic PHP settings (error reporting, etc), and defines the main constant
to the main folder structure of the project; there is no bootstrapping code, 
with the exception of some conditional phpunit configuration code.

`environment.php` is where all your module paths and stacking is defined.

`phpunit.xml` is your phpunit configuration. To run your tests just run `phpunit
 -c phpunit.xml`.

`composer.json` is your package management. See: http://getcomposer.org/

Refactoring classes and methods
===============================

Refactoring methods in an IDE is quite straight forward. As long as the IDE has
scanned the honeypot file and made the connection between classes, the process 
should just work.

Refactoring classes on the other hand is a 3-step process due to how IDE's need
to be able to understand the link between the dynamic app namespace and regular
namespaces.

Steps:

 * go to the honeypot file and refactor the app version
 * then refactor the specific module version
 * then change the file name of the class to match the new class name

Note that methods you access in views though variables may not get refactored 
if the IDE didn't get hinted to the type of the variable in that context.

General Tips
============

 * All non-class files are located in the directory of `+App` in each module. 
This includes configuration files (`+App/config`), translation files (`+App/lang`), 
views, themes, etc (and also 3rd party files, `+App/vendor`).

 * If you create a module and need to use a third party component the best way
is to just stick it into `+App/vendor` and load it into an adapter class.

 * You can use the overlord command line utility via the `order` command. Using 
it you can among other things create modules (`make:module`) & classes 
(`make:class`). 

 * When creating modules via overlord, you can pass the `--sandbox-template` 
flag to create a module for writing "shortcircuits", for the purpose of 
debugging complex operations in your code. Once activated the `/sandbox/` route
will point to your shortcircuted snippet.

 * The `--mockup-template` is another `make:module` flag that creates a mockup
module which makes life easier for designers. The mockup module gives admin 
rights to guest users and creates a path `/mockup/` where designers can view
theme targets, create dummy content and view pages with different access
levels.

 * When creating classes you can specify is tests should be auto-generated via
the `--with-tests` flag.

 * If find yourself creating a lot of classes of a certain pattern, you can help
yourself by setting up a `config/ibidem/conventions` file to match certain class
pattern and adjust the generated content accordingly.

 * This is not a MVC framework, it's anything-you-want-it-to-be framework. By 
default a lot of things do use MVC though. The general formula used is `Model`,
low level static libraries for data manipulation, validation, etc; `Context`s, 
instantiatable classes that provide a "accessible" interface for communicating 
with `Model`'s; `Controller`s middleware which dictatates/controls basic 
application flow; and while there are traditional views mostly `Themes` are used 
for everything since they manage besides the html, the scripts, styles and other 
resources. So, typically, the controller gets and checks the request, creates a 
theme object and gives it a target to render and provides a "main" context and a 
control object (typically the control object is itself). The theme then looks at 
the target and depending on how it's configured by the designer this can map to 
a file, a template, or a combination of various files and templates. Inside the 
resulting files (views) the code now has access to the main context and if need 
be may initialize additional contexts (based on the main context if required) 
which it then uses to create the page and send the rendered version back to the 
controller which then sends it up the layer stack and eventually it reaches the
user.

Workflows
=========

Creating themes
---------------

You can create a theme via the `make:theme` order. By default this will create 
an embeded theme. Similarly you can create a style in that theme via 
`make:style`.

You may move your theme anywhere if you wish and simply map it in your 
`environmnet.php` file. Typically you want to do this for the main themes in 
your application so designers have an easier time getting to them.

In the case of generic modules on the other hand you want to keep the themes 
embeded.

Configuration files
-------------------

Configuration files are simply php files that return an array.

Here's an empty one <code><?php return [];</code>.

You don't have to follow the pattern as long as you return an array. So for
example if you have some generic third party configuration file and you want to
make it visible to the system you can just have something like 
<code><?php return include 'path/to/generic/configuration.inc';</code>

To access a configuration file you just call the `config` method on the `CFS`

<pre>$my_configuration = \app\CFS::config('my/configuration');</pre>

You can have a configuration file with the same name in every module in your 
project. They will be merged with the top values overwriting the bottom values.

Creating tasks
--------------

Tasks are basically command line tools. All command line tools available via 
`order` (ie. the overlord utility) are Tasks.

To create a task you need a `Task_*` file with an `execute` method extending
`\app\Task`.

In addition you will also need to define the task in a `ibidem/tasks` config 
file. The name of the task in the configuration should be the name of your task
class with underscores converted to semicolons and all lowercase, eg. 
`Task_Do_Homework` => `do:homework`.

In your configuration you will need to specify flags, the types of the flags,
description for the task, etc. See the configuration in the ibidem/base module
for examples.

You configuration will be translated to the command line help page and your 
flags will be read and sent to your Task_* class. You can access them via 
`$this->config` inside your class.

Creating backends
-----------------

Backends are a way of easily creating cross-application interfaces for
managing your application. They are not designed for users but the system 
administrators. Management of generic functionality for which you've created
modules should be done via backends, if at all possible.

To create a backend simply create a Backend_* file to act as both context
and controller for your backend and then create a configuration file 
`ibidem/backend` with the necesary information describing your backend.

A simple example, (configuration file boilerplate ommitted for clarity)

<pre>
# the category for our backend
'General' => array
	(
		# a page in our backend; this will show up in navigation
		# the key here is the slug the page will use
		'my-backend-index' => array
			(
				'icon' => 'reorder',
				'title' => 'My Awesome Backend',
				'context' => '\app\Backend_MyBackend',
				'view' => 'awesome-self/backend/my-backend-index'
			),

		# sometimes you'll need hidden pages, such as the page for editing
		'my-backend-edit' => array
			(
				'hidden' => true,
				'title' => 'Edit Something',
				'context' => '\app\Backend_MyBackend',
				'view' => 'awesome-self/backend/my-backend-index'
			),
	),
</pre>

The Backend file itself is merely a generic controller/context. 

Most backends are collections (users, configurations, etc). By extending 
`\app\Backend_Collection` you'll get a lot of the necessary functionality out of
the box. See the `ibidem/access` module for examples of creating backends.

When creating a backend don't forget to include a protocol object in the 
`+admin` group to allow access to it.

Access control
--------------

All relays that have a Layer_Access at their top are subject to access control.

What this means is that unless you provide an access rule for them they won't be 
visible.

To do this create a `ibidem/access` configuration file then inside a `whitelist`
define for the role of your choosing a protocol object that grants access to 
your relay.

Let's say you're defining a backend, it might look something like this

<pre>
'whitelist' => array # allow
	(
		'+admin' => array
			(
				\app\Protocol::instance()
					->relays(['\ibidem\backend'])
					->attributes
						(
							[
								'my-backend-index', 
								'my-backend-edit',
							]
						)
			),
	),
</pre>

The access control by default is purely algorythmic. You provide context and it
determines if given said context the given role (current role) has access or
does not have access.

This is not done to avoid database calls (though that's a plus) but rather to
allow for infinitely fine grained control over the conditions. Whereas in an ACL
you could only say X has access to Y here you "decide" if X has access to Y. So
to give a silly example, you can "decide" X has access to Y only during working
hours and working days. Similarly say you have a blog, with a bunch of comments
from a bunch of registered users. To create code that shows/hides various 
options depending on who you are in that context (ie. the owner, the owner of
the comment to which you replied, the owner of the blog post in question) would
require unimaginably large ACLs, but algorythmically you can just pass the 
current id of the owner and blog post owner, etc since you know them when going
though your display loop and then the system can just tell you if it's allowed 
or not based on that onpage information. Of course you could just hardcode it
as well, but the access logic wouldn't be centralized then.

Creating a Relay
----------------

A relay is basically (for www content) the equivalent of a route. They can act
as other things, hence why they're Relays and not Routes.

To create a relay you need to create a `ibidem/relays` configuration file. 

Here's an example:

<pre>
'frontend' => array
	(
		'matcher' => \app\Route_Pattern::instance()->standard('', []),
		'controller' => '\app\Controller_Frontend',
		'action' => 'action_index',
	)
</pre>

Only the route (ie. router) is actually required here.

You then create a `+App/relays.php` file, that defines a process for your relay.

eg.

<pre>
$mvc_stack = function ($relay, $target)
	{
		\app\Layer::stack
			(
				\app\Layer_Access::instance()
					->relay_config($relay)
					->target($target),
				\app\Layer_HTTP::instance(),
				\app\Layer_HTML::instance(),
				\app\Layer_MVC::instance()
					->relay_config($relay)
			);
	};

\app\Relay::process('frontend', $mvc_stack);
</pre>

Relays are processed in order of modules and in order of which their process
statements are located in the `+App/relays.php` file in said modules.

As with backends don't forget to allow your relays in your `ibidem/access` 
files.

eg.

<pre>
'whitelist' => array
	(
		'+common' => array
			(
				\app\Protocol::instance()
					->relays
						([
							// general pages
							'frontend',
						]),
			),
	)
</pre>

This is not necessary of course if Layer_Access is not present in the layer 
stack.

All relays accept an `enabled` parameter that can be used to turn them off. This 
can be useful when using modules but not using the modules relays.

You can also overwrite a relays route declaration to serve your needs, if 
somehow a relay in a module conflicts with a path you wish to have in your 
application.

Creating Routes
-----------------

Relays are the default way of matching a request to a handler stack. 
Unfortunately, relays are long as hell. In the case of a typical web application
we have quite a lot of simply `some_pattern => some_key` matching, so to allow
for easy definition of this we have routes.

The syntax for a route is simply:
<pre>
	"the-&lt;pattern&gt;/goes/here"
		=> [ 'key', [ 'param' => '/regex/' ], [ 'POST', 'GET', ... ],
</pre>

Example:
<pre>
<?php namespace app;

$slug = [ 'slug' => '#[a-z-]+#' ];
$id = [ 'id' => '#[0-9]+#' ];

return array
	(
		// the 'GET' method is assumed when no methods are mentioned
		"profile/&lt;id&gt;-&lt;slug&gt;"
			=> [ 'profile', $key + $slug ],
	),
</pre>

Schematics
----------

Schematics are used as a means of creating/migrating your database.

Any schematic is composed of two elements, the channel+nominator and the serial
number. The channel and nominator categorize the schematic and map it to a class
while the serial identifies the target version to which the channel of the 
schematic will be at after it is applied.

A channel+nominator looks like this `our-demo:base`. The channel serves to
isolate the migration operations. Different channels can have the same serial
mean different things, but the same channel needs serials to mean a clearly 
defined point in the codebases lifecycle, except for jump serials. The nominator 
specifies the rest of the class. Semicolons and dashes are converted to spaces 
and the `Schematic_` prefix is added to obtain the class. Thus, the class for our 
earlier example would be `Schamtic_Our_Demo_Base`.

Since the class mapping can go deep, you can use the command 
`make:schematic -n yournamespace -s our-demo:base` to have it created for you.

All Schematic class files may define (at most) 4 operations: up, down, move, 
build. `up` is where code for creating database structures should be placed, 
`down` on the other hand is where teardown code is placed. `build` is for 
operation that populate the database, and `move` is for operations that either
add new structural elements, convert existing ones, etc.

For ease of use (with simple schematics) the methods `constraints`, `table`, 
`processor`, `destroy`, and `update` from the class `\app\Schematic` may be 
used. This are not necessary for the schematic to function however; any approach 
may be applied as long as the 4 methods maintain the purpose defined above.

Example `up`
<pre>
function up()
{
	\app\Schematic::table
		(
			\app\Model_Example::table(),
			'
				`id`        :key_primary,
				`message`   varchar(255),

				PRIMARY KEY(`id`)
			'
		);
}
</pre>

Example `down`
<pre>
function down() 
{
	\app\Schematic::destroy
		(
			\app\Model_Example::table()
		);
}
</pre>

Example `build`
<pre>
function build()
{
	\app\Model_Example::assemble(array('message' => 'hello, world'));
}
</pre>

Example `move`
<pre>
function move()
{
	\app\Schematic::alter
		(
			\app\Model_Example::table(),
			'
				ADD COLUMN `user` :key_foreign AFTER `message`
			'
		);
}
</pre>

Example `constraints`
<pre>
function bind()
{
	\app\Schematic::constraints
		(
			[
				\app\Model_Example::table() => array
					(
						'user' => [ \app\Model_User::table(), 'CASCADE', 'CASCADE' ],
					),
			]
		);
}
</pre>

Example `processor`
<pre>
function move()
{
	// [...]

	$sql_update_birthday = \app\SQL::prepare
		(
			__METHOD__.':update_birthday',
			'
				UPDATE `'.\app\Model_Profile::table().'`
				   SET birthday = :birthday
				 WHERE user = :user
			',
			'mysql'
		)
		->bind(':user', $user)
		->bind(':birthday', $birthday);
		
	\app\Schematic::processor
		(
			\app\Model_Profile::table(), 
			\app\Model_Profile::count(),
			function ( & $profile) use ($sql_update_birthday, $user, $birthday)
			{
				if (static::valid_ssn($profile['ssn']))
				{
					$user = $profile['user'];
					$birthday = static::ssn_to_birthday($user['ssn']);
					$sql_update_birthday->execute();
				}
			},
			1000 # how many rows to process at a time
		);
}
</pre>

All schematics need to be defined in the `steps` category of a 
`ibidem/schematics` configuration file.

Example:
<pre>
'steps' => array
	(
		'namespace-something:base'            => [ 'serial' => '1:0-default' ],
		'namespace-something:timestamp-field' => [ 'serial' => '2:0-default' ],
		'namespace-something:assoc-to-X'      => [ 'serial' => '2:1-default' ],
	),
</pre>

Serials are read as follows: The first number is the version number. Smaller
numbers are executed before larger numbers. The 2nd, 3rd etc (to infinity) 
numbers are priority numbers, larger numbers are executed first. The word(s) 
after the dash is the tag. A tag is basically a branch in a tree of schematics 
in a channel. Tags are used to differentiate between two possible database 
versions with conflicting outcomes (such a different 
interpretation/representation of particular feature in the application). Mostly 
you just deal with the `default` tag. 

The basic commands for managing schematics are,

 * `make:schematic` (mentioned earlier) for easily creating schematic classes
 * `db:init` for initializing the database; required for most operations
 * `db:version` for checking current database channel serials
 * `db:uninstall` for running teardown code
 * `db:install` for running teardown code then building everything to the latest
defined schematic (will run db:uninstall and db:init by itself)
 * `db:reset` for doing an install to a set serial, instead of the latest
 * `db:upgrade` for performing all schematics from the last schematic (not 
including) to the latest one.