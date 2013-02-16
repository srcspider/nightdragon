<?
	namespace app;

	/* @var $theme   ThemeView */
	/* @var $context Controller_Login */
	/* @var $control Controller_Login */
?>

<? if (\app\Auth::role() === \app\Auth::Guest): ?>

	<h2><?= Lang::key('demo:title/signin') ?></h2>

	<?= $f = HTML::form($control->action('signin'), 'demo:general')
		->errors_are($errors['mjolnir:access/signin.errors']) ?>

	<div class="form-horizontal">

		<? if (isset($errors['mjolnir:access/signin.errors'], $errors['mjolnir:access/signin.errors']['form'])): ?>
			<ul>
				<? foreach ($errors['mjolnir:access/signin.errors']['form'] as $error): ?>
				<li><?= $error ?></li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>

		<?= $f->text(Lang::key('demo:login/username'), 'identity') ?>
		<?= $f->password(Lang::key('demo:login/password'), 'password') ?>
		<?= $f->checkbox(Lang::key('demo:login/rememberme'), 'rememberme') ?>

		<div class="form-actions">
			<button class="btn btn-primary" <?= $f->mark() ?>>
				<?= Lang::key('demo:login/submit') ?>
			</button>
		</div>

	</div>

<? else: # signed in ?>

	<p><?= Lang::key('demo:login/signed-in-as', ['name' => Auth::nickname()]) ?></p>

<? endif; ?>