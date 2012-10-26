Installing dependencies...

<pre>
vendor-install
</pre>

Alternatively, simply open install-vendor and use it as a guide.

(On windows use git bash and have php in your path.)

-

Updating dependencies...

<pre>
vendor-update
</pre>

This is directly tied to your `composer.json` file.

-

The `drafts/www` directory is where all the files that need to be
in your public directory are located. Various settings such as configuration
files for things like sphinx, etc should also go in `drafts/`. You will find
server specific files in `drafts/www.<server>`

To get going copy the contents of `drafts/www` to your public directory, or
a subdirectory there in. Also copy your server specific files located in
`drafts/www.<server>` (eg. `drafts/www.apache`).

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
Apache with .htaccess support is so easy to setup.

-

More documentation is provided in the demo application and `docs/` directory.

Running Tests
=============

Unit testing is supported via PHPUnit, behaviour testing is supported via behat.

It is recommended you write mostly behaviour tests.

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

See: docs/README.md for more information