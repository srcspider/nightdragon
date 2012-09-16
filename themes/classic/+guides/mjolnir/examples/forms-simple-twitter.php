<?
	namespace app;

	/* @var $context Context_Book */
	/* @var $control Controller_Book */
	/* @var $theme   ThemeView */
?>

<div class="well">
	<?= $f = Form::instance()
		->action($control->action('publish'))
		->errors($errors['Book.publish'])
		->classes(['form-horizontal']) ?>

		<fieldset>
			<?= $f->text('Book Title', 'title')
				->template('<div class="control-group"><span class="control-label">:name</span><div class="controls">:field</div></div>') ?>
		</fieldset>

		<div class="form-actions">
			<button class="btn btn-primary btn-large"
					type="submit" <?= $f->sign() ?>>
				Publish
			</button>
		</div>

	<?= $f->close() ?>
</div>