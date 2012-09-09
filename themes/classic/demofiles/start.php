<?
	/** @var $context \app\Context_Start */

	namespace app;
	
	$ds = DIRECTORY_SEPARATOR;
	
	// H is an utility for managing headers
	$h = H::up(); # header level
?>

<div id="frontend">

	<<?= $h ?>>Welcome to your mjölnir app!</<?= $h ?>>

	<p>To start working on the design go to <code><?= DOCROOT.'themes'.$ds.'classic' ?></code>.</p>

	<p>To start working on the code to make things tick go to <code><?= DOCROOT.'modules' ?></code>.</p>

	<hr/>
	
	<p>To get rid of all these pesky demo files just do the following:</p>
	
	<ol>
		<li>delete <code><?= DOCROOT.'themes'.$ds.'classic'.$ds.'demofiles' ?></code></li>
		<li>cleanup the <code>fontend<?= EXT ?></code> and <code>about<?= EXT ?></code> files (ie. truncate them)
		<li>delete <code><?= DOCROOT.'modules'.$ds.'demo' ?></code> and remove it from <code><?= DOCROOT.'environemnt'.EXT ?></code>
	</ol>
	
	<p>All done!</p>
	
</div>