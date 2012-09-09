
Composer Information
====================


Behat
-----

	"behat/behat"

Behat is behaviour testing suite. It's required for running behaviour tests.

You can read about behat at: http://docs.behat.org/quick_intro.html


Mink
----

	"behat/mink"

Mink is a web acceptance testing tool. It's related to behat. Read about it
at http://mink.behat.org/


Mink Zombie.js driver
---------------------

	"behat/mink-zombie-driver"

The zombie drivers for Mink are meant for headless browser emulation;
ie. anything that doesn't involve ajax, javascript, etc. Node.js must be 
installed on the host system. An alternative is goutte; however at this time the 
packages cause conflicts and can't be installed properly.

The following are required for the Zombie.js driver to function:
 http://nodejs.org/
 http://npmjs.org/
 npm install -g zombie


Mink Sahi driver
----------------

	"behat/mink-sahi-driver"

Sahi is another driver for Mink. Sahi is a "browser controller"; also used in
testing. Alternative drivers to Sahi are the seleium (1 and 2) drivers. Sahi is
prefered for simplicity.

Sahi must be installed for the driver to be able to communicate with it:
http://sourceforge.net/projects/sahi/files/
And don't forget to run it with `sahi.sh`


Framework
---------

	"mjolnir/cfs"
	"mjolnir/types"
	"mjolnir/base"
	"mjolnir/theme"
	"mjolnir/cache"
	"mjolnir/access"
	"mjolnir/backend"
	"mjolnir/legacy"
	"mjolnir/schematics"
	"mjolnir/database" 
	"mjolnir/html"

All of the above are framework files.