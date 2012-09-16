<?
	namespace app;

	/* @var $context Context_Guide */
	/* @var $control Controller_Mockup */
	/* @var $theme   ThemeView */

	# you can access this file via /mockup/guide

	// headers
	$h1 = H::up();
?>

<div class="container">

	<div class="row">
		<div class="span12">
			<<?= $h1 ?>>Guide</<?= $h1 ?>>

			<p>This is a snippet reference. Please do not use this as a "style"
			guide for the project. Refer to the <a href="ref">style
			reference</a> for anything to do with the visual styling of
			elements.</p>

			<p>Some examples are provided. A framework specific reference is also
			included. You are encouraged to add to this guide all your project
			specific snippets!</p>

			<hr/>

		</div>
	</div>

	<div class="row">


		<div class="span12">

			<ul class="nav nav-tabs">
				<li><a href="#mjolnir-html">Mjölnir HTML</a></li>
				<li><a href="#jshadow-help">jShadow</a></li>
				<li><a href="#jquery-plugins">jQuery Plugins</a></li>
				<li><a href="#unsorted-plugins">Unsorted Plugins</a></li>
			</ul>

			<?= $theme->partial('+guides/mjolnir/index')
				->variable('id', 'mjolnir-html')
				->variable('h', $h1)
				->render() ?>

			<?= $theme->partial('+guides/jshadow/index')
				->variable('id', 'jshadow-help')
				->variable('h', $h1)
				->render() ?>

			<?= $theme->partial('+guides/jquery/index')
				->variable('id', 'jquery-plugins')
				->variable('h', $h1)
				->render() ?>

			<?= $theme->partial('+guides/unsorted/index')
				->variable('id', 'unsorted-plugins')
				->variable('h', $h1)
				->render() ?>

		</div>

	</div>

</div>

<div style="height: 100px;" />