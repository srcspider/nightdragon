<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<? $template = '<tr><td>:field</td><td>:name</td></tr>' ?>

		<table>
			<?= $f->text('Book Title', 'title')->template($template) ?>
			<?= $f->text('Author', 'author')->template($template) ?>
		</table>

	<?= $f->close() ?>
</div>