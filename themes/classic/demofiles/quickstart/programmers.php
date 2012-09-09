<?
	/** @var $context \app\Context_About */

	namespace app;
	
	// H is an utility for managing headers
	$h = H::current(); # header level
?>

<<?= $h ?>>Quick-Start for Programmers</<?= $h ?>>

<p>Your code should go into <code><?= DOCROOT.'modules'.DIRECTORY_SEPARATOR ?></code></p>

<p>
	Your environment files are <code><?= 'enviroment'.EXT ?></code> and <code><?= 'mjolnir'.EXT ?></code> 
	located at <code><?= DOCROOT ?></code>.
</p>

<p>
	You can use the <code>order</code> command line utility for most tasks. It is highly recommended
	you use it for creating classes since it will try and create classes in a very smart way, such
	as filling certain classes with helpful contents to save you time.
</p>

<hr/>
<p>More docs are available at the <code><?= DOCROOT.'docs'.DIRECTORY_SEPARATOR ?></code> directory</p>