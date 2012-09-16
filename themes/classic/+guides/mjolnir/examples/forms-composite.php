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
			<?= $f->text('Book', 'title') ?>
			<?= $f->composite
				(
					'Author',
					$f->text(null, 'family_name'),
					$f->text(null, 'given_name')
				)
				->format('%1 %2')
			?>
		</fieldset>

		<div class="form-actions">
			<button class="btn btn-primary btn-large"
					type="submit" <?= $f->sign() ?>>
				Publish
			</button>
		</div>

	<?= $f->close() ?>
</div>