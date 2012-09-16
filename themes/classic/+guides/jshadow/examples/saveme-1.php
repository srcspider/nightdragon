<?= $f = \app\Form::i('twitter.general', $control->action('do_something'))
	->auto_complete($fields)
	->attr('data-saveme', '') ?>

	<div class="alert alert-warning" data-saveme-msg>
		You have unsaved changes.
	</div>

	<fieldset>

		<?= $f->text('Given Name', 'given_name') ?>
		<?= $f->text('Family Name', 'family_name') ?>

		<div class="form-actions">
			<button class="btn btn-primary" type="submit" <?= $f->sign() ?>>Save</button>
		</div>
	</fieldset>

<?= $f->close() ?>