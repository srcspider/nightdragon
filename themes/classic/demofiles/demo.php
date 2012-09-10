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

	<p>
		<b>Hey where's the style?</b>
	</p>

	<p>
		By default the demo is setup for compiling both <code>.scss</code> files to <code>.css</code>
		files, as well as optimizing your javascript via the closure compiler (source maps are
		always nice!). Compiling things however has the unfortunate snag of causing pointless merge
		conflicts when working with source version control, so to avoid that all generated files are
		(typically) ignored.
	</p>

	<p>
		To see the style you need to activate the monitors. So in the case of the demo you just go to
		the theme directory <code><?= DOCROOT.'themes'.$ds.'classic' ?></code> and launch the style
		monitor <code><?= '+styles'.$ds.'default'.$ds.'+start.rb' ?></code> and script monitor
		<code><?= '+scripts'.$ds.'+start.rb' ?></code> which look at your files for changes and
		compile as necessary as they happen. <small class="muted">(by default scripts run google's
		closure compiler and styles run the sass compiler via compass)</small>
	</p>

	<hr/>

	<p>To get rid of all these pesky demo files just do the following:</p>

	<ol>
		<li>delete <code><?= DOCROOT.'themes'.$ds.'classic'.$ds.'demofiles' ?></code></li>
		<li>remove the targets from your <code><?= '+theme'.EXT ?></code>, <code><?= '+style'.EXT ?></code> and <code><?= '+script'.EXT ?></code> configuration files
		<li>delete <code><?= DOCROOT.'modules'.$ds.'demo' ?></code> and remove it from <code><?= DOCROOT.'environemnt'.EXT ?></code>
	</ol>

	<p>All done!</p>

</div>