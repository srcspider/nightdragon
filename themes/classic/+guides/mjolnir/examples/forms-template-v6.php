<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->field_template('<tr><td>:field</td><td>:name</td></tr>', ['text'])
		->errors($errors['Book.publish']) ?>

		<table>
			<?= $f->text('Book Title', 'title') ?>
			<?= $f->text('Author', 'author') ?>
		</table>

	<?= $f->close() ?>
</div>