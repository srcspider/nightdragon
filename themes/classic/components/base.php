<?
	namespace app;

	/* @var $context Context_Frontend */
	/* @var $theme ThemeView */

	// H is an utility for managing headers
	$h = H::current(); # header level

	// The following adds to the header of our page; headinclude returns an
	// object that's very similar to a view. When it's rendered just like a
	// normal view you'll get the contents (should you need to pass them as
	// a string) but at the same time the contents will also be appended to the
	// header of the page.
	//
	// Mjolnir manages most header related tasks for you, and also keeps them
	// far away so you don't have to care. If you do ever need to mess with the
	// header, this is how you add to it. In this case just go into
	// components/header and add whatever you wish.
	$theme->headinclude('components/header')->render();
?>

<div class="container">

	<?
		// The following includes a script on the page. The script will be
		// included imeditly after the theme scripts.

#		$theme->script('http://lol.js');
	?>

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

<?
	// Same as header, only content is injected right before body ends. Well,
	// provided no other footerinclude is called after this that is.

	$theme->footerinclude('components/footer')->render();
?>