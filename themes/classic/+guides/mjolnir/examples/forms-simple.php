<?
	namespace app;

	/* @var $context Context_Book */
	/* @var $control Controller_Book */
	/* @var $theme   ThemeView */

	$my_form = Form::instance();
	$my_form->action($control->action('publish'));
	$my_form->errors($errors['Book.publish']);
?>

<div class="well">
	<?= $my_form->open() ?>

		<dl>
			<?= $my_form->text('Book Title', 'title') ?>
			<?= $my_form->submit('Publish') ?>
		</dl>

	<?= $my_form->close() ?>
</div>