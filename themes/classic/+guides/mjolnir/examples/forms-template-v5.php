<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<table>
			<? $f->groupformat('<tr><td>:field</td><td>:name</td></tr>') ?>
				<?= $f->text('Book Title', 'title') ?>
				<?= $f->text('Author', 'author') ?>
			<? $f->endformat() ?>
		</table>

	<?= $f->close() ?>
</div>