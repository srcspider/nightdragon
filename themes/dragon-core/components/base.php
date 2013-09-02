<?
	namespace app;

	/* @var $theme ThemeView */
	/* @var $lang  Lang */

	$theme->headinclude('components/head')->render();
?>

<div id="wrap">
	<?= $theme->partial('components/nav')->render() ?>
	<?= $entrypoint->render() ?>
</div>

<div id="footer">
	<div class="container">
		<p class="text-muted credit">
			<i>This humble blog is built with <a href="http://ibidem.github.io">The Mjolnir Library</a>. The source can be found on <a href="https://github.com/srcspider/nightdragon">github.</a></i>
		</p>
	</div>
</div>