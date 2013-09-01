<?
	namespace app;

	/* @var $context Backend_Post */
	/* @var $control Controller_Backend */

	$columns = array
		(
			'title' => 'Title',
			'posttime' => 'Post Time',
			'posted' => 'Visibility',
		);

	$renderers = array
		(
			'posted' => function (array &$entry)
				{
					return $entry['posted'] ? 'public' : 'draft';
				},
			'posttime' => function (array &$entry)
				{
					return $entry['posttime']->format('Y-m-d @ H:i');
				}
		);

	$actions = array
		(
			'post-edit' => array
				(
					'title' => 'Edit',
					'class' => 'btn-warning',
				)
		);
?>

<h1>Posts</h1>

<?= \app\View::instance('mjolnir/backend/template/indexer')
	->inherit($this) # inject context, control, etc
	->pass('search_columns', ['title'])
	->pass('default_order', ['posttime' => 'desc'])
	->pass('columns', $columns)
	->pass('renderers', $renderers)
	->pass('actions', $actions)
	->pass('plural', 'posts')
	->pass('singular', 'post')
	->render() ?>
