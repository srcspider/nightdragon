<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<? $template = $theme->partial('path/to/partial')
			->variable('name', ':name')
			->variable('field', ':field')
			->render() ?> ?>

		<table>
			<?= $f->text('Book Title', 'title')->template($template) ?>
			<?= $f->text('Author', 'author')->template($template) ?>
		</table>

	<?= $f->close() ?>
</div>