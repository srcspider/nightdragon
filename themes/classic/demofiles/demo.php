<?
	namespace app;

	/* @var $context Context_Demo */
	/* @var $theme ThemeView */

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
		To see the style you need to activate the watchers. So in the case of the demo you just go to
		the theme directory <code><?= DOCROOT.'themes'.$ds.'classic' ?></code> and launch the style
		monitor <code><?= '+styles'.$ds.'default'.$ds.'+start.rb' ?></code> and script monitor
		<code><?= '+scripts'.$ds.'+start.rb' ?></code> which look at your files for changes and
		compile as necessary. <small class="muted">(by default scripts run google's closure compiler
		and styles run the sass compiler via compass)</small>
	</p>

	<hr/>

	<p>To get rid of all these pesky demo files just do the following:</p>

	<ol>
		<li>delete <code><?= DOCROOT.'themes'.$ds.'classic'.$ds.'demofiles' ?></code></li>
		<li>remove the targets from your <code><?= '+theme'.EXT ?></code>, <code><?= '+style'.EXT ?></code> and <code><?= '+script'.EXT ?></code> configuration files
		<li>delete <code><?= DOCROOT.'modules'.$ds.'demo' ?></code> and remove it from <code><?= DOCROOT.'environemnt'.EXT ?></code>
	</ol>

	<p>All done!</p>

	<hr/>

	<p><big>Moving forward...</big></p>

	<p>There a few approaches to using the template.</p>

	<ol>
		<li><p>The most obvious way is to just remove the <code>.git</code>
			directory (<code>rm -rf .git</code>), re-initialize the directory
			(<code>git init</code>) and then use it as the initial structure
			(<code>git add .</code>, <code>git commit -m 'initial structure'</code>).</p>
		</li>

		<li><p>Another way would be to just branch out and do your work in the
			new branch. May seem silly, but if you just want to use the template
			for quick testing, prototyping or some other isolated development
			technique, it works great since you can easily pull in template updates, as
			well as maintain multiple such prototypes in the same project. You can go
			further and rename the remote (<code>git remote rename origin mjolnir</code>)
			add your own <code>origin</code> (<code>git remote add origin
			<span class="text-info">&lt;your-repo&gt;</span></code>) and then use
			it to push a clean master to your own remote while keeping the
			template remote for updates.</p>
		</li>

		<li><p>Yet another way is to use the method above to create your own template,
			if you find yourself repeating creating repetative project structure over
			and over. You then re-apply the methodology but for your own custom template.
			The idea here is you might want a completely
			different project structure then the current default.
			<small class="muted">(yes it's all customizable and in your hands)</small> Or
			you might just have your own favorite tools (Doctrine? Vagrant?). Or maybe you
			just have some default js/scss plugins/libraries you want to be there. Making
			your own template, or a specialized template, can help a lot.</p>
		</li>

	</ol>

</div>