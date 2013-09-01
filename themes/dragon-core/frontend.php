<?
	namespace app;

	/* @var $context Controller_Frontend */
	/* @var $theme   ThemeView */
	/* @var $lang    Lang */

	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$pager = $context->pager();
	$pagecount = $pager->pagecount();
?>

<div class="jumbotron">
	<div class="container">
		<h1 id="srcspider-blogtitle">The <span class="accent">Source</span> Spider</h1>
		<p style="text-align: right; max-width: 650px;">to get in contact just <a href="https://twitter.com/srcspider">throw a table at me on twitter</a></p>
	</div>
</div>

<div class="content">
	<div class="container">

		<? if ($context->postcount() > 0): ?>

			<? foreach ($context->posts($page) as $post): ?>
				<div class="row">
					<div class="col-md-9 content-block">
						<h3><?= $post['title'] ?></h3>
						<?= $post['body'] ?>
					</div>
				</div>
			<? endforeach; ?>

			<? if ($pagecount > 1): ?>
				<div class="row">
					<div class="col-md-9 content-block content-block-rounded">
						<?= $pager->apply('twitter') ?>
					</div>
				</div>
			<? endif; ?>

		<? else: # no posts, blank state ?>

			<div class="row">
				<div class="col-md-9 content-block content-block-rounded">
					<h3>Oups!</h3>
					<p><em>No posts are available yet. Please check back later.</em></p>
				</div>
			</div>

		<? endif; ?>

	</div>
</div>