<div class="well">
	<?= $f = \app\Form::i('twitter.general', $control->action('publish'))
		->field_template('<div>:name</div><div>:errors</div><div>:field</div>')
		->errors($errors['Book.publish']) ?>

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

		<fieldset>
			<?= $f->text('Book Title', 'title')->error_printer($error_printer) ?>
		</fieldset>

	<?= $f->close() ?>
</div>