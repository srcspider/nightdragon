<?= $f = \app\Form::i('twitter.general', $control->action('do_something')) ?>

	<fieldset data-equation-context>

		<?= $f->text('A', 'a') ?>
		<?= $f->text('B', 'b') ?>
		<?= $f->text('C', 'c') ?>
		
		<hr/>
		
		<?= $f->text('A + B', null)
			->attr('data-equation', '$a + $b') ?>
		<?= $f->text('A * B + C', null)
			->attr('data-equation', '$a * $b + $c') ?>
		<?= $f->text('A * (B + C + A - A * C)', null)
			->attr('data-equation', '$a * ($b + $c + $a - $a * $c)') ?>
		<?= $f->text('A * (3 * 6) + 5', null)
			->attr('data-equation', '$a * my.times_six(3) + 5') ?>

	</fieldset>

<?= $f->close() ?>