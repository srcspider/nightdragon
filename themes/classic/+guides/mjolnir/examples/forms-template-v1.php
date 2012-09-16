<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<table>
			<?= $f->text('Book Title', 'title')->template('<tr><td>:field</td><td>:name</td></tr>') ?>
			<?= $f->text('Author', 'author')->template('<tr><td>:field</td><td>:name</td></tr>') ?>
		</table>

	<?= $f->close() ?>
</div>