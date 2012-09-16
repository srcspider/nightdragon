<?
	namespace app;

	/* @var $context Context_Book */
	/* @var $control Controller_Book */
	/* @var $theme   ThemeView */
?>

<div class="well">
	<?= $f = Form::instance()
		->action($control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<dl>
			<?= $f->text('Book Title', 'title') ?>
		</dl>

		<div>
			<?= $f->submit('Publish')->template(':field') ?>
		</div>

	<?= $f->close() ?>
</div>