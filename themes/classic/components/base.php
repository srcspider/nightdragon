<?
	/** @var $context \app\Context_Frontend */

	namespace app;
	
	// H is an utility for managing headers
	$h = H::current(); # header level
?>

<div class="container">
	
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?= $context->site_url() ?>"><?= $context->site_title() ?></a>
				<ul class="nav">
					<? foreach ($context->navlist() as $i): ?>
						<li><a href="<?= $i['url'] ?>" rel="section"><?= $i['title'] ?></a></li>
					<? endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	
	<?= $view->render() ?>
	
</div>