<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->field_template('<div>:name</div><div>:field</div>')
		->errors($errors['Book.publish']) ?>

		<fieldset>
			<?= $f->text('Book Title', 'title') ?>
		</fieldset>

	<?= $f->close() ?>
</div>