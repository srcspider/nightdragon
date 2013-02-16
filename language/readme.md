Assume html context for all translations.

-

Files should be arrays, and unlike their config counterparts they should not be
indented in. This is due to how the syntax for heredocs and nowdocs works in PHP
to prevent mistakes.

-

Please follow the following convention for naming:
	
	project:relevant_section/descriptive_name

eg.

	project:accounting/activity

Do NOT use extentions on the name, eg.

	project:accounting/activity.tr

The same convention with extentions is used in the rest of the application for
various other components such as routes, relays etc. By convention in the 
application and framework all keys with out the extention are understood as
translation keys to avoid confusion when reading.

The section is not mandatory, and should be omitted for generic terminology, eg.

	project:dashboard

This entire section (ie. `DOCROOT/language`) is dedicated to messages; if a 
term translation will do see `modules/+application/+App/config/lang`
