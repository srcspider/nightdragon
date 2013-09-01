<?
	namespace app;

	/* @var $theme ThemeView */
	/* @var $lang  Lang */

	$theme->headinclude('components/head')->render();
?>
<div id="wrap">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 content-block">
					<?= $entrypoint->render() ?>
				</div>
			</div>
		</div>
	</div>
</div>