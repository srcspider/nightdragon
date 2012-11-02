<b>Installing dependencies...</b>

<pre>
bin/vendor/install
</pre>

Alternatively, simply open install-vendor and use it as a guide.

(On windows use git bash and have php in your path.)

-

<b>Updating dependencies...</b>

<pre>
bin/vendor/update
</pre>

This is directly tied to your `composer.json` file.

-

Getting up and running
======================

The `+App/drafts/www/` directory is where all the files that need to be
in your public directory are located. Various settings such as configuration
files for things like sphinx, etc should also go in `+App/drafts/`. You will 
find server specific files in `+App/drafts/www.<server>`. The framework has
the convention for modules of keeping any public directory dependencies
along with other configuration/dependencies into their own `+App/drafts/'
directory. It is recomended however that you duplicate their files into
your project's '+App/drafts/' directory.

To get going copy the contents of `+App/drafts/www` to your public directory, 
or a subdirectory there in. Also copy your server specific files located in
`drafts/www.<server>` (eg. `+App/drafts/www.apache`).

We'll assume the path to your public directory (or subdirectory if it's the
case) is `PUBPATH` from here on.

You will also need to do some basic configuration before things will work:

 * you will need to set the domain in the new `PUBPATH/config.php` file 

 * in `PUBPATH/config.php` set `system.dir` to point to the root of the 
 project (ie. where this file, and all the other files are located)

 * set `private.files` to point to the directory where you want to story your
 configuration overwrites. Your private files are where all your secret keys
 are located. [!!] Do not store keys on git or any other version control!

If you're using a directory instead of the domain root, you will also need to
set the correct rewrite base in the `.htaccess` file (as an example) as well 
as the `path` in the `PUBPATH/config.php` file. You should try to avoid using 
`.htaccess` files but for simplicity this is the default for testing since 
Apache with `.htaccess` support is so easy to setup.

-

Errors
======

Mjolnir is extremely log centric. While the framework does try to output more 
developer friendly errors and will also issue stack traces when in development
mode, logs are the primary means by which you should be looking for errors.

The recomended way is to have a second window up running something like 
`tail -f short.log`. If you don't have a second monitor it's not a problem, you
hopefully don't have too look at it too often. You will find `short.log` in 
`+App/logs`. As per it's name it is a 1-line description of the error. The 
master log(s) on the other hand will contain a stack trace in addition to the 
message, as well as be sorted by date (note: ALL log entries can be found in the
main log, other master logs are only used for filtering purposes).

Several reasons for relying on logs over verbose client side messages:

	1. Errors reporting directly to the user are always pretty nasty so the 
	framework tries its best to redirect the user to some apropriate looking 
	page; this in turn has the side effect of making hard to see errors	even 
	though output. (mitigating this requires a lot of excess code and given the
	next issues doesn't solve all that much)

	2. When errors occur inside the tags themselves the results are usually 
	one of the following: the entire page will get mangled (especially with 
	xdebug running), the style will go haywire, or in the worst case scenario 
	the error code is interpreted as valid code and it is invisible inside the 
	code. Logs have no such problem; the output is always clean and to the point.

	3. Unless you decide you want to be fancy and base64 all your dependencies 
	a typical webpage is a combination of multiple resources coming togheter. It
	is very easy and very common for errors to popup in said resources with no 
	imediatly visible effect on the page. Searching for errors in all your files
	until you find the culprit is also a pain. By simply viewing the log you can
	keep a tab on everything at once.

Mjolnir provides a means of capturing "client" errors. This is enabled by
default. The demo application comes with support for javascript errors; so for 
basic webapp based on the demo your `short.log` will show EVERYTHING. You can 
take this further and issue reports from other dependencies you use as well, be
they client or server side.

-

Running Tests
=============

Unit testing is supported via PHPUnit, behaviour testing is supported via behat.

It is recommended you write mostly behaviour tests.

<b>To run behaviour tests</b> you simply need to have a `behat.yaml` somewhere
in your system (it is recomended you place them in `+App/features`). Then run:

<pre>
bin/order behat --ansi --expand
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

Any other parameters you provide will be passed directly to behat. See behat
documentation at: http://docs.behat.org/

<b>To run unit tests</b> simply call phpunit on a `phpunit.xml` configuration
file. You must create the file to suit your needs. Any class that works with
the `Instantiatable` class will allow you to replace it with a mock if you
include the test version of `Instantiatable` from the cfs module.

<pre>
phpunit -c phpunit.xml
</pre>

Tests are located in each module's <code>+App/tests</code>. You may place them
anywhere, but make sure to point `phpunit.xml` to that location.

-

See `+App/help/README.md` for more information