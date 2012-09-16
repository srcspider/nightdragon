<?= $f = \app\Form::i('twitter.general', $control->act('some_action')) ?>

	<?= $f->select('Bear', 'bears')
		->values($data, 'id',  'title')
		->classes(['chzn-select']) ?>

	<?= $f->select('Bears', 'uber_bears[]')->attr('multiple', 'multiple')
		->values($data, 'id',  'title')
		->classes(['chzn-select']) ?>

	<div class="form-actions">
		<button class="btn btn-primary" type="submit" <?= $f->sign() ?>>
			Release the bears!
		</button>
	</div>

<?= $f->close() ?>