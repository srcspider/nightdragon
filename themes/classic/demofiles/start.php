<?
	/** @var $context \app\Context_About */

	namespace app;

	// H is an utility for managing headers
	$h = H::up(); # header level
?>

<ul class="nav nav-tabs">
	<li><a href="#designers-quickstart">Quick-Start for Designers</a></li>
	<li><a href="#programmers-quickstart">Quick-Start for Programmers</a></li>
</ul>

<div id="designers-quickstart">
	<?= $theme->partial('demofiles/quickstart/designers')->render() ?>
</div>

<div id="programmers-quickstart">
	<?= $theme->partial('demofiles/quickstart/programmers')->render() ?>
</div>
