<?= $f = \app\Form::i('twitter.general', $control->act('demo'))
	->attr('data-xsync-scope', '') ?>

	<fieldset>
		
		<?
			$type1_field = $f->select('Type 1', 'type1')->values($examples, 'id', 'title');
			$type2_field = $f->select('Type 2', 'type2');
			$type3_field = $f->select('Type 3', 'type3');
		?>
		
		<?= $type1_field
			->attr('data-xsync', '#'.$type2_field->field_id())
			->attr('data-xsync-call', $type2_resolver)
			->attr('data-xsync-blank', '&amp;nbsp') ?>
		
		<?= $type2_field
			->attr('disabled', '')
			->attr('data-xsync', '#'.$type3_field->field_id())
			->attr('data-xsync-call', $type3_resolver)
			->attr('data-xsync-blank', '&amp;nbsp') ?>
		
		<?= $type3_field
			->attr('disabled', '') ?>
		
	</fieldset>

	<div class="form-actions">
		<button type="submit" <?= $f->sign() ?>
				class="btn btn-primary">
			Submit
		</button>
	</div>

<?= $f->close() ?>