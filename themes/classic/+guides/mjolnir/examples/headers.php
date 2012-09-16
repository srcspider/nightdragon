<?
	namespace app;

	/* @var $context Context_Person */
	/* @var $control Controller_Person */
	/* @var $theme   ThemeView */

	$h1 = H::up($h);
	$h2 = H::up($h1);
?>

<div class="well">

	<<?= $h1 ?>>File Header Level 1</<?= $h1 ?>>

	<p>Lorem ipsum...</p>

	<<?= $h2 ?>>File Header Level 2</<?= $h2 ?>>

	<p>Lorem ipsum...</p>

</div>