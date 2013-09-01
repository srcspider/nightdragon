<?
	namespace app;

	/* @var $context Backend_User */
	/* @var $control Controller_Backend */

	$id = $_REQUEST['id'];
	$post = \array_merge($context->entry($id), $_POST);
	$post['posttime'] = $post['posttime']->format('Y-m-d H:i:s');
?>

<div role="application">

	<h1>Edit Post #<?= $id ?></h1>

	<br/>

	<?= $form = HTML::form($control->action('update'), 'mjolnir:twitter')
		->errors_are($errors['post-update'])
		->autocomplete($post) ?>

	<div class="form-horizontal">
		<fieldset>
			<?= $form->hidden('id')
				->value_is($id) ?>

			<?= $form->text('Title', 'title')
				->set('autocomplete', 'off') ?>

			<?= $form->datetime('Date &amp; Time', 'posttime')
				->value_is(\date('Y-m-d H:i:s'))
				->render() ?>

			<?= $form->textarea('&nbsp;', 'body')
				->set('style', 'min-width: 600px; min-height: 400px') ?>

			<?= $form->select('Visibility', 'posted')
				->options_array(['false' => 'Draft', 'true' => 'Public'])
				->value_is('false') ?>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary" <?= $form->mark() ?>>
					Update
				</button>
				<a class="btn btn-small"
				   href="<?= \app\URL::href('mjolnir:backend.route', ['slug' => 'post-index']) ?>">
					Back to Post Index
				</a>
			</div>
		</fieldset>
	</div>

</div>
