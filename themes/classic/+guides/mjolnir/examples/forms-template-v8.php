<div class="well">
	<?= $f = \app\Form::instance()
		->action($control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<table>
			<?= $f->text('Book Title', 'title') ?>
			<?= $f->text('Author', 'author') ?>
		</table>

	<?= $f->close() ?>
</div>