<?= $f = \app\Form::i('twitter.general', $control->act('demo')) ?>

	<fieldset>
		<div data-backselect-context>
			
			<?= $f->select('Person', 'person')
				->attr('data-backselect-source', '-')
				->values($people, 'id', 'title') ?>
			
			<?= $f->select('Employee', 'employee')
				->attr('data-backselect-source', '-')
				->values($employees, 'id', 'title') ?>
			
			<div data-backselect>
				<?= $f->text('Other', 'other')
					->attr('data-backselect-blank', 'Mr. Custom')
					->value('') ?>
			</div>
			
		</div>
	</fieldset>

	<div class="form-actions">
		<button type="submit" <?= $f->sign() ?>
				class="btn btn-primary">
			Submit
		</button>
	</div>

<?= $f->close() ?>