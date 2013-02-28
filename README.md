Install Guide
=============

## Requirements

 * **console version** of [git](http://git-scm.com/), you can use the [github install guide](https://help.github.com/articles/set-up-git); reference: [git docs](http://git-scm.com/documentation), or [git ref](http://gitref.org/)
 * **if you own private repositories**: SSH access to the repos ([SSH guide for github](https://help.github.com/articles/generating-ssh-keys))
 * a working \*nix compatible console (on windows use `git bash` that comes with git)
 * a working server (LAMP/WAMP/MAMP are fine for development), a server setup should contain
   - PHP (on windows it's easier to install a separate version for console use)
   - a web server (Apache, nginx, etc)
   - optionally a database (by default support for MySQL is available)

## Steps

To get everything up and running requires a 3 step process.
 
 1. setting up the project files
 2. setting up the private files
 3. setting up the public files

From here on we will consider your https or git protocol repository url as 
`REPO` and your project code name as `PROJECT`. These are placeholders, please
replace them in the example code bellow with your actual repo url and project 
code name.

As an example, for the Mjolnir demo project `REPO` is 
`git@github.com:ibidem/mjolnir-template-app.git` (for SSH access) or 
`https://github.com/ibidem/mjolnir-template-app.git` (for normal HTTPS). And
`PORJECT` can be `demo` or `mjolnir-template-app`, etc. On github you should
see the project repository urls on the project page.

Any other ALLCAPTICALS words bellow are also placeholders and you should not 
take them literally.

### Step 1: Setting up the project files

First we need to retrieve a local copy of the project files...  (ie. `git clone`)

	cd /path/to/your/working/directory-or-partition/
	git clone REPO PROJECT
	cd PROJECT/

### Step 1.1: Setting up file permissions (situational)

You should make sure all your files contain appropriate permissions 
(use `ls -l` to check).

The files **should be already setup correctly**, but in case they aren't you can use
the following commands to ensure the files have appropriate access levels.

	chmod +x order
	chmod -R +x bin/
	chmod 750 etc/logs/
	chmod 750 etc/cache/
	chmod 750 etc/tmp

It's also recommended you set up a appropriate user to manage the project. 
Assuming your user is the same as PROJECT and your group is SERVGROUP you would
do configure the project files with the following commands after switching to
a user with administrative access (`root` on *nix systems):

	chown -R PROJECT .
	chgrp -R SERVGROUP .

This setup allows your server to access the files and via your account you can
perform maintenance with out any risk of damaging other files on the server.

Make sure your user has SSH setup correctly to access to appropriate 
repositories. In the case of Github, this implies you have an account (any
free account will do), and the owner of the repository has either added you as a 
collaborator or to a team with appropriate access.

### Step 1.2: Installing PHP dependencies

Most project dependencies are external, so you will have pull them in.

In your project root run:

	bin/vendor/install
	
The command will install PHP dependencies using Composer. After the install 
process has completed you should run:

	bin/vendor/status

This will display information on all installed dependencies (version and 
description). Please confirm no inappropriate versions were installed for your 
use case (ie. unauthorized experimental development releases in production).

Once you've confirmed the integrity of the installed PHP dependencies run:

	./order

You should see a help list of commands. If you aren't seeing this something has
gone horribly wrong when installing your dependencies. Please review the 
previous steps. 

If all is well up to this point run:

	./order status

This will run dependency checks specified by project modules. If all 
dependencies are satisfied you should get a "passed" rating, this is appropriate
for production, if the rating is "failed" the module is missing some key 
functionality but it is still able to function with out them (more or less), if
the rating is "error" the module is missing a critical requirement, you will 
need to check your server setup and configuration to ensure the requirement is
satisfied or otherwise the system will run in an unstable state.

In production you should always aim for all "passed", in development you may
get away with some components on "failed" depending on what you're working on.

At this point you may also confirm you've gotten an appropriate version of the
application by running:

	./order versions

The command will output versioning information from all registered modules.

You may also run:

	./order cleanup

The command will perform a cleanup on various application controlled system 
files.

### Step 1.3: Installing style dependencies

First we need to install all the dependencies:

	./order bower --install

This will pull in dependencies such as jquery, plugins, style libraries such as
bootstrap and other dependencies specified by themes on the system. Each theme
will require it's own copy of the dependencies so you may see multiple instances
of the same dependency during the install; this is perfectly normal.

After the dependencies have been installed (almost always these will be 
installed in source format for development purposes) most of them will require
some form of compilation before we can use them. *To obtain a production ready
version of the files* run:

	./order compile

The process may occasionally stall for up to a minute if is require to download
some appropriate compiler.

*Note: the `./order compile` is for generating production files. If you are doing
development on the files you may want to use the appropriate polling script 
(typically this takes the form of a `start.rb` file) to benefit from debug 
information such as source maps, etc.*

### Step 1.4: Installing the database (optional)

**DO NOT PERFORM IF THE DATABASE ISNT EMPTY**

To set up your database run this command:

	./order db:install

This will *destroy* any copies of the components it needs to install (by this
we're referring to tables not entire databases), initialize and load in a copy
of the database structure with all channels updated to the latest version.

If you recieve an error on database access **DO NOT** go and insert your 
password / username in the project configuration. Not only is this wrong but 
likely won't work since the values in your private files will overwrite them.

Troubleshooting Checklist:

 1. did you create the database
 2. did you specify the correct path to your private files in the file 
 `privatefiles` on the root of your project
 3. did you insert the correct user / password in the database configuration in
 your private files
 4. are your dependencies installed correctly (see previous steps)
 5. are your permissions set up correctly

If you've gone though all that and still can't figure it out, debug it.

### Step 2: Setting up the private files

The private files are for the most part the configuration files containing your
secret keys. **It is imperative that you do NOT place ANY security information 
in your project files!**

To setup the files first copy the draft version of the files to a secure 
location preferably where only the root user and server has access, and then
create a file `privatefiles` on the project root where you specify this path
so the system knows where to find them:

	cp -R drafts/project.private /secure/path/PROJECT.private/
	echo "/secure/path/PROJECT.private/" > privatefiles

Of course at this point you would `cd /secure/path/PROJECT.private/` and start
filling in the keys. The files should NEVER contain anything more then security
information such as public / private keys, users, passwords, database names, 
etc.

### Step 3: Setting up the public files

For web projects at this point you would want to setup your public files which
are accessible for your users. We will consider `/path/to/www` to point to your
publicly accessible files via the web server. If you are running the project in
a folder consider that folder to be `www`.

	cd /path/to/www
	cp -R /path/to/PROJECT/drafts/www .

You should now have a `config.php` file on the project root. This is the domain
configuration. You may have multiple domains using the same project files, the
`config.php` files on their root specify their settings.

A quick checklist:
	
 * insert an appropriate domain name, ie. `www.exmple.com`, or `example.com`
 * set up an apropriate path base, ie. `/` for root, `/some/path/` for folder 
 based sites
 * set the site's development mode to on if you're doing development (by default
 development mode is off)
 * set up caching (by default caching is turned on)

 * set the `private.files` value to the appropriate path to your private files,
 ie. `/secure/path/PROJECT.private/` in the examples above
 * set the `system.dir` to the appropriate system directory (ie. where you 
 cloned your project)

When you are ready disable maintenance to open your site to the public (by 
default maintanence is on). The option is `maintancen` in your `config.php` 
file.

### Step 3.1: Setting up the server specific files

Some servers may require additional files besides the base files required by 
your project's PHP code. Assuming your server is apache as an example, you would
have to copy the extra files like this

	cp -R /path/to/PROJECT/drafts/www.apache .

And you would of course also need to inspect the copies configuration files and
change accordingly (for the `www.apache` version you will only need to change
the `RewriteBase` in the main `.htaccess` file if you're not on the domain 
root).

*Please inspect your project's `drafts` folder for any additional dependencies, 
such as node server files, etc. You will have to follow the instruction provided
by each since covering them is outside the scope of this document.*

## Congratulations on completing the setup

You should at this point have an working project. Regardless if you're doing
prototyping, development or are here to alter/enhance the project, you should
refer to the manual; sections for starting up, to working on an existing project
are available.

Sections of the manual are maintained by each module. And modules may insert 
their own manual entries (this includes project specific modules). To generate
the latest copy run the following:

	./order librarian --manual

A html (and pdf) version will be generated on the project root.
