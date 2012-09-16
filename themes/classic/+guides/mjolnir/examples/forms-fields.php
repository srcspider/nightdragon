<?
	namespace app;

	/* @var $context Context_Book */
	/* @var $control Controller_Book */
	/* @var $theme   ThemeView */
?>

<div class="well">
	<?= $f = Form::i('twitter.general', $control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<fieldset>
			<?= $f->text('Book Title', 'title') ?>
			<?= $f->number('Copies #', 'copies') ?>
			<?= $f->datetime('Release Date', 'release_date') ?>
			<?= $f->textarea('Description', 'description') ?>
			<?= $f->password('Password', 'password') ?>
		</fieldset>

		<div class="form-actions">
			<button class="btn btn-primary btn-large"
					type="submit" <?= $f->sign() ?>>
				Publish
			</button>
		</div>

	<?= $f->close() ?>
</div>