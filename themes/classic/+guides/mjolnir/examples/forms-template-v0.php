<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->errors($errors['Book.publish']) ?>

		<table>
			<tr><td><input <?= $f->sign() ?> type="text" name="title"/></td><td>Book Title</td></tr>
			<tr><td><input <?= $f->sign() ?> type="text" name="author"/></td><td>Author</td></tr>
		</table>

	<?= $f->close() ?>
</div>