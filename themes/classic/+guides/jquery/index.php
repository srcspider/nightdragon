<?
	namespace app;

	/* @var $context Context_Guide */
	/* @var $control Controller_Mockup */
	/* @var $theme   ThemeView */

	// view variables
	$id = isset($id) ? $id : 'jquery-plugins';

	$theme_base = \realpath(__DIR__.'/../../').DIRECTORY_SEPARATOR;
	$current_dir = \realpath(__DIR__).DIRECTORY_SEPARATOR;

	// headers
	$h1 = H::up($h);
	$h2 = H::up($h1);
?>

<div id="<?= $id ?>">

	<ul class="nav nav-tabs">
		<? foreach (['chosen'] as $plugin): ?>
			<li><a href="#jquery-plugin-<?= $plugin ?>-tab">jquery.<?= $plugin ?></a></li>
		<? endforeach; ?>
	</ul>

	<div id="jquery-plugin-chosen-tab">

		<<?= $h1 ?>>Chosen</<?= $h1 ?>>

		<p><code>chosen</code> customizes select boxes into better select boxes;
		especially good for multi-select boxes.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/chosen'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?
			$data =array
				(
					['title'=>'White', 'id' => 1],
					['title'=>'Black', 'id' => 2],
					['title'=>'Gray',  'id' => 3],
					['title'=>'Red',   'id' => 4],
					['title'=>'Pink',  'id' => 5],
				);
		?>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('data', $data)
			->render() ?>

	</div>

</div>