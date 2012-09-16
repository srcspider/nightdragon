<?
	$error_printer = function ($errors)
		{
			$out = '';
			foreach ($errors as $error)
			{
				$out = '<span class="alert alert-error">'.$error.'</span>';
			}

			return $out;
		};
?>

<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->field_template('<div>:name</div><div>:errors</div><div>:field</div>')
		->field_error_printer($error_printer)
		->errors($errors['Book.publish']) ?>

		<fieldset>
			<?= $f->text('Book Title', 'title') ?>
		</fieldset>

	<?= $f->close() ?>
</div>