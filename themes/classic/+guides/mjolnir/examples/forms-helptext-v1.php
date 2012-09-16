<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->field_template('<div>:name</div><div>:field :help</div>')
		->field_helptemplate('<span class="alert alert-info">:help</span>')
		->errors($errors['Book.publish']) ?>

		<fieldset>
			<?= $f->text('Book Title', 'title')
				->help('Title can be at most 30 characters.') ?>
			
		</fieldset>

	<?= $f->close() ?>
</div>