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

The `drafts/www.<server>` directory is where all the files that need to be 
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
file. You must create the file to suit your needs. Any class that works with
the `Instantiatable` class will allow you to replace it with a mock.

<pre>
phpunit -c phpunit.xml
</pre>

Tests are located in each module's <code>+App/tests</code>. You may place them 
anywhere, but make sure to point `phpunit.xml` to that location.

See: docs/README.md for more information