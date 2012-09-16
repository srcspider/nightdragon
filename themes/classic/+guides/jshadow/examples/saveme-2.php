<?= $f = \app\Form::i('twitter.general', $control->action('do_something'))
	->auto_complete($fields)
	->attr('data-saveme', '') ?>

	<fieldset>

		<?= $f->text('Given Name', 'given_name') ?>
		<?= $f->text('Family Name', 'family_name') ?>

		<div class="form-actions off" data-saveme-msg>
			<button class="btn btn-primary" type="submit" <?= $f->sign() ?>>Save</button>
		</div>
		
	</fieldset>

<?= $f->close() ?>