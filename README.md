*Windows Users*, please use `git bash` and have php in your path.

<b>Getting the files...</b>

	git clone https://github.com/ibidem/mjolnir-template-app.git yourprojectname
	cd yourprojectname/
	git remote rename origin mjolnir

In some cases you may have to change permissions

	chmod -R +x bin/
	chmod +x order
	chmod 750 +App/logs/
	chmod 750 +App/cache/
	chmod 750 +App/tmp

Replace 750 with whatever is appropriate for your server setup.

The template repo only contains the `mj/template` branch. You should add another
remote named `origin` to your repo and use `mjolnir` only for pulling template
changes. Github's repo creation process provides the commands.

Note the use of the https version. When on a server this variant is the most
convenient to use.

-

<b>Installing dependencies...</b>

	bin/vendor/install

Alternatively, simply open `bin/vendor/install` and use it as a guide.

-

<b>Updating dependencies...</b>

	bin/vendor/update

This is directly tied to your `composer.json` file. You can always update your
composer file and re-run this command. You can also re-run the command to check
for updates. For packages go to: https://packagist.org/

-

<b>Verifying dependencies</b>

	bin/vendor/status

This will display the installed packages, versions, description as well as
indicate if you have made modification in them.

-

Getting up and running
======================

The `drafts/www/` directory is where all the files that need to be
in your public directory are located. Various settings such as configuration
files for things like sphinx, etc should also go in `drafts/`. You will
find server specific files in `drafts/www.<server>` or just
`drafts/<server>` if they are not meant to go into your public directory.
The framework has the convention for modules of keeping any public directory
dependencies along with other configuration/dependencies into their own
`drafts/` directory. It is recommended however that you duplicate their
files into your project's `drafts/` directory.

To get going copy the contents of `drafts/www` to your public directory,
or a subdirectory there in. Also copy your server specific files located in
`drafts/www.<server>` (eg. `drafts/www.apache`). Copy any other non-www
server files as needed.

We'll assume the path to your public directory (or subdirectory if it's the
case) is `PUBPATH` from here on.

You will need to do some basic configuration before things will work:

 * set the domain in the new `PUBPATH/config.php` file; also review the server
 files for configuration settings such as rewrite base

 * in `PUBPATH/config.php` set `system.dir` to point to the root of the
 project (ie. where this file, and all the other project files are located);
 we'll refer to the root of the project as `DOCROOT` from here on

 * copy `mjolnir.private` to a centralized location; the more restricted the
 better. Feel free to rename it to `your_project.private` or as you see fit.

 * in `PUBPATH/config.php` set `private.files` to point to the directory where
 you want to store your configuration overwrites
 (ie. where you moved `mjolnir.private` to). Your private files are where all
 your secret keys should be located <br>
 **Do NOT store keys on git or any other version control!**

 * create a `DOCROOT/.private` file; the following command will work on all
 systems: `echo "path/to/private/files" > .private`, obviously replace the path
 with your own

 * run `./order compile` to compile all the style files, and any other resources
 that require compilation

If you're using the site for testing or development,

 * create a `DOCROOT/.testsite` file pointing to the URL of the site, so the
 project knows which site it's serving; the following command will work on all
 systems: `echo "http://mysite.url" > .testsite`. The reason for this is that
 with the setup, a single project may serve many public sites, and a public
 site may switch between many projects, so there's no bond between them, hence
 why you need to specify one for your tests to know where to go

If you're using a directory instead of the domain root, you will also need to
set the correct rewrite base in the `.htaccess` file (as an example) as well
as the `path` in the `PUBPATH/config.php` file. You should try to avoid using
`.htaccess` files but for simplicity this is the default for testing since
Apache with `.htaccess` support is very easy to setup.

Eventually you will also want to...

 * customize `404.php`, `downtime.php`, `error.php` and `outage.php` to share
 the same look and feel as the rest of your site; the system will always try to
 use the equivalent from your themes but when an irrecoverable error occurs one
 of these files will be used to ensure the user doesn't get a confusing
 technical page.

 * replace `favicon.ico` with your own

 * enable `static-theme` so all your style files (css, javascript, etc) are
 served directly by the server and not though PHP; when enabled don't forget to
 change `APPVERSION` whenever you do upgrades; otherwise you will always be
 serving the old files

A few tips for setting up in a production environment,

 * always have (at least) two project clones; one is always the master and one
 one is always your (pre-production) test site, both on the same server, and
 running on independent databases. You would then swap between them when
 upgrading, to minimize downtime. We'll refer to one as "master" and the other
 as "test" here after...

 * make sure to have a backup always ready, be it database backup, project
 files, etc.

 * easiest and safest way to upgrade is to `git pull` your changes into the
 project files of the test site, run your `./order db:upgrade` to perform any
 database manipulation and when you verify nothing is broken (preferably though
 some automated tests) you go into the `PUBPATH/config.php` of your current
 master, turn maintenance on, switch the `project.files` to your old test, run
 `echo "path/to/master/private/files" > .private` perform `./order db:upgrade`,
 verify again nothing broke (you can bypass maintenance via the maintenance
 password). If it's all clear turn off maintenance, go to your test site, set
 it's project files to your old master, and in it's `DOCROOT` run
 `echo "path/to/test/private/files" > .private`.

 * note that you never change the `private.path` in your public directories (for
 neither the test or master site). If properly setup, your private files (all
 keys, database configuration, etc) are safely tucked away from your project
 files and public files, there's never a need to touch them when upgrading,
 unless it's to add new private files. Another way to look at it is, you never
 have to re-configure anything when upgrading.

 * an alternative to the above is to just have multiple versions,
 ie. `git clone ... your_project.v3.2` and so on. You simply point them to the
 same private files.

*The setup may be far more sophisticated and automated. The above is only a very
basic easy to use example of doing things.*

Documentation
=============

For documentation run:

	./order librarian --manual

A `manual.html` and `manual.pdf` file will be created in your project root.

-

Errors
======

Mjolnir is extremely log centric. While the framework does try to output more
developer friendly errors and issue stack traces when in development mode, logs
are the primary means by which you should be looking for errors.

The recommended way is to have a second window up running, ie.
`tail -f +App/logs/short.log`. If you don't have a second monitor it's not a
problem, you shouldn't have too look at it too often (not constantly anyway).
You will find `short.log` in `+App/logs`. As per it's name it is a 1-line
description of the error. Feel free to discard it, detailed error reports are
saved in your master log. The master log(s) will contain a stack trace in
addition to the message, additional informations, as well as be sorted by date
(all log entries can be found in the main log, other master logs are only
used for filtering purposes).

Several reasons for relying on logs over verbose client side messages:

1. Errors reported directly to the user are always pretty nasty so the
framework tries its best to redirect the user to some appropriate looking
page; this in turn has the side effect of making errors hard to see. (mitigating
this requires a lot of excess code)

2. When errors occur inside the tags themselves the results are usually
one of the following: the entire page will get mangled (especially with
xdebug running), the style will go haywire, or in the worst case scenario
the error code is interpreted as valid code and it is invisible inside the
code. Logs have no such problem; the output is always clean and to the point.

3. Unless you decide you want to be fancy and base64 all your dependencies
a typical webpage is a combination of multiple resources coming togheter. It
is very easy and very common for errors to popup in said resources with no
immediate effect on the page. Searching for errors in all your files
until you find the culprit is also a pain. By simply viewing the log you can
keep a tab on everything at once.

Mjolnir provides a means of capturing "client" errors. This is enabled by
default. The demo application comes with support for javascript errors; so for
basic webapp based on the demo your `short.log` will show <b>everything</b>. You
can take this further and issue reports from other dependencies you use as well,
"client" here refers to anything that's not the application itself.

-

Running Tests
=============

It is recommended you write mostly behaviour tests. Though you can easily
integrate plain old phpunit and run unit tests.

<b>To run behaviour tests</b> you simply need to have a `behat.yaml` somewhere
in your system (it is recommended you place them in `+App/features`). Then run:

	./order behat --ansi

The framework will scan and run the behat command on the `behat.yaml`. Note that
all paths in your `behat.yaml` are relative to the directory where the file is
located. Here is the minimum `behat.yaml` file for the tests to run:

	default:
	  paths:
	    features:   '.'
	    bootstrap:  './bootstrap'

The framework will only scan registered modules for `behat.yaml`s.

You may also immediately follow the `./order behat` command with
`--feature "something"` to filter out all feature (directories) to only the ones
that match the pattern.

Any other parameters you provide will be passed directly to behat. See behat
documentation at: http://docs.behat.org/

If you wish to run the behat command normally, simply use `bin/behat`.

The Demo has a very basic example at `DOCROOT/modules/demo/+App/features/Demo`.
To run it, just type in `./order behat --feature Demo`. It is configured to use
Goutte, so it requires no extra dependencies. To test things like javascript
dependent pages you will need to run it though selenium2 driver; required
project files are already included, you just need the server. To get it go to
http://seleniumhq.org/download/ (you want the download under "Selenium Server").
Once you have the jar file run it by typing `java -jar your/server/file`. You
can now modify the tests to run though Selenium2 instead of Goutte by adding a
`@javascript` tag after the `@navigation` tag, like so:

	@navigation @javascript
	Feature: navigate site

Of course you could just add it to only individual scenarios if you wanted.

If you ever encounter issues when writing tests in behat, inject the step
`show last response` or `print last response` to get what the driver was seeing
when it failed (or succeeded unexpectedly).

You don't need neither Goutte nor Selenium (nor equivalent) for tests related to
your classes; they are only for testing things like accessing web pages, filling
in forms, pressing buttons, etc. You should use Goutte if you can, but in the
case of forms you may wish to always use Selenium (or equivalent) to guarantee
the tests are accurate.

For more info on behat see: http://behat.org/ <br>
For information on Goutte and other drivers see: http://mink.behat.org/ <br>
[A cheatsheet on both](http://blog.lepine.pro/wp-content/uploads/2012/03/behat-cheat-sheet-en.pdf) is available.
