<?= $f = \app\Form::i('twitter.general', $control->act('demo')) ?>

	<fieldset>
		<div data-xselect-scope data-xselect-blank="-">
			
			<? $apples = $f->select(null, 'apples')
				->values($apples, 'id', 'title')
				->attr('data-xselect-source', 'Apples') ?>
			
			<? $oranges = $f->select(null, 'oranges')
				->values($oranges, 'id', 'title')
				->attr('data-xselect-source', 'Oranges') ?>
			
			<? $master = $f->select(null, null)
				->attr('data-xselect-master', '') ?>
			
			<?= $f->composite('Example', $apples, $oranges, $master); ?>
			
		</div>
	</fieldset>

	<div class="form-actions">
		<button type="submit" <?= $f->sign() ?>
				class="btn btn-primary">
			Submit
		</button>
	</div>

<?= $f->close() ?>