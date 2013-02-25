<?
	namespace app;

	/* @var $theme ThemeView */
?>

<div class="container">

	<div class="masthead">
		<ul class="nav nav-pills pull-right">

			<? if (Access::can('dashboard.public')): ?>
				<li>
					<a href="<?= URL::href('dashboard.public') ?>">
						<?= Lang::key('demo:title/dashboard') ?>
					</a>
				</li>
			<? endif; ?>

			<li>
				<a href="<?= URL::href('home.public') ?>">
					<?= Lang::key('demo:title/home') ?>
				</a>
			</li>

			<li>
				<? if (\app\Auth::role() === \app\Auth::Guest): ?>
					<a href="<?= \app\URL::href('login.public') ?>">
						<?= Lang::key('demo:login/singin') ?>
					</a>
				<? else: # signed in ?>
					<a href="<?= \app\URL::href('login.public', ['action' => 'signout']) ?>">
						<?= Lang::key('demo:login/signout') ?>
					</a>
				<? endif; ?>
			</li>

		</ul>
		<h1 class="muted">
			<?= Lang::key('demo:title') ?>
		</h1>
	</div>

	<hr/>

	<?= $entrypoint->render() ?>

</div>
