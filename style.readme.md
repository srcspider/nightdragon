Style
=====

* PHP code should be in [K&R](https://en.wikipedia.org/wiki/Indent_style#K.26R_style)
style ie. braces on new line. All braces should follow this rule not just 
functions. All other code (javascript, etc) should be in Allman style.

* Indentation should use tabs.

* Don't use the public access modifier; it is unnecesary, verbose and makes the
distinction between function and non-function as well as between static and 
non-static harder.

* There are no if's with out braces.

* There are no while, for, etc with out braces either!

* If you're writing a logical or/and then always use `&&` and `||`. In PHP you 
also have `AND` and `OR` BUT THEY ARE NOT THE SAME THING! The precedence on 
OR and AND is different then && and ||.

* When testing equality prefer === and !== over == and != since the long version
also tests type and avoid funky errors.

* The ! (not) operator should always have spaces before and after the operator 
to highlight it, for example: <code>if ( ! self::is_secure_connection())</code>

* If you have a empty method, array, or whatever for whatever reason, add a 
comment `// empty` or something else that is appropriate in it's body.

* Put long and hard to read logical conditions in their own function.