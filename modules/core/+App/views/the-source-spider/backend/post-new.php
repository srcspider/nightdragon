<?
	namespace app;

	/* @var $context Backend_Post */
	/* @var $control Controller_Backend */
?>

<h1>New Post</h1>

<div role="application">

	<?= $form = HTML::form($control->action('new'), 'mjolnir:twitter')
		->autocomplete($_POST)
		->errors_are($errors['post-new']) ?>

	<div class="form-horizontal">
		<fieldset>

			<?= $form->text('Title', 'title')
				->set('autocomplete', 'off') ?>

			<?= $form->datetime('Date &amp; Time', 'posttime')
				->value_is(\date('Y-m-d H:i:s')) ?>

			<?= $form->textarea('&nbsp;', 'body')
				->set('style', 'min-width: 600px; min-height: 400px') ?>

			<?= $form->select('Visibility', 'posted')
				->options_array(['false' => 'Draft', 'true' => 'Public'])
				->value_is('false') ?>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary" <?= $form->mark() ?>>Publish</button>
			</div>
		</fieldset>
	</div>

</div>
