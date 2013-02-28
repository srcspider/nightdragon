Style
=====

* PHP code should be in [K&R](https://en.wikipedia.org/wiki/Indent_style#K.26R_style)
style ie. braces on new line. All braces should follow this rule not just 
functions. All other code (javascript, etc) should be in Allman style.

* always use `&&` and `||` (`and` and `or` operators are actually different; 
they kind-of function the same way, but not always)

* Indentation should use tabs.

* There are no `if`'s with out braces. There are no `while`, `for`, etc with out braces either!

* Put long and hard to read logical conditions in their own function, even if 
they are only used in one place.

* view files (ie. files with a lot of html, etc) should use the alternative 
syntax (ie. `foreach (...): endforeach;`, etc); they should also declare the
`app` namespace at the top of the file and use short tags.

* When testing equality prefer === and !== over == and != since the long version
also tests type and avoid funky errors. Of course if you want to test 1 == '1' 
then by all means use ==

* The ! (not) operator should always have spaces before and after the operator 
to highlight it, for example: <code>if ( ! self::is_secure_connection())</code>

* The & (reference) operator should never have a space after it. The reason for 
this is to allow for all uses (not just the times when it's used in function 
parameters) to share the same syntax: `function example(&param1)`, 
`$x = &somefunction();`

* If you have an empty method, array, or anything else, for whatever reason, add 
a comment `// empty` or similar message in it's body to explicitly specify the
code was not left empty on accident.

* Don't use the public access modifier; it is unnecessary, verbose and makes the
distinction between function and non-function as well as between static and 
non-static harder to read.

* Do not use the `private` modifier, always use `protected`. The only valid use 
of `private` is when you are facing a problem that is technically impossible 
with  out its use. The problem with `private` is that only the people extending 
your class are actually qualified to tell you which attributes should be 
`private`, so what happens is that every use of `private` (outside of extreme 
cases of  everything being private) simply makes the options to the extending 
class a lot more limited, so it hurts class hierarchies (a lot).

* When a method returns the current object, the `@return` doc comment should 
read: `@return \app\Your_Class_Here $this` (or equivalent using the interface 
instead of the class)
