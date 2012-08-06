Style
=====

* PHP code should be in [K&R](https://en.wikipedia.org/wiki/Indent_style#K.26R_style)
style ie. braces on new line. All braces should follow this rule not just 
functions. All other code (javascript, etc) should be in Allman style.

* Indentation should use tabs.

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

* Don't use the public access modifier; it is unnecessary, verbose and makes the
distinction between function and non-function as well as between static and 
non-static harder.

* The following rule applies to documentation blocks: "Any function has either
a `@return` comment or a small explanation on what it does; or both. `@param`, 
as well as other documentation comments are unnecessary." Most methods that 
don't return typically require some extra explanation on what they exactly do 
since they (mostly) imply a processing of some data. On the other hand when a 
method returns something it's typically self explanatory what it does, with the 
exception of methods returning $this for method chaining purposes. Only 
`@return` is useful for autocomplete, `@param` does not do anything, and is 
just a more verbose version of the parameter list. Instead of a `@param` list
a comment on what the method constitutes better use of time and space. Concise
method docs with only an explanation and `@return` (and/or `@throws`) 
statement(s) are preferred over documentation with lots of `@param` declarations
and other doc tags with very little practical application.

* When a method returns the current object, the `@return` doc comment should 
read: `@return \app\Your_Class_Here $this`

* Put long and hard to read logical conditions in their own function.