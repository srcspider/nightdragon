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
		<? foreach (['SyntaxHighlighter'] as $plugin): ?>
			<li><a href="#unsorted-plugin-<?= $plugin ?>"><?= $plugin ?></a></li>
		<? endforeach; ?>
	</ul>

	<div id="unsorted-plugin-SyntaxHighlighter-tab">

		<<?= $h1 ?>>SyntaxHighlighter</<?= $h1 ?>>

		<p>Just as the name implies it highlights code. All the examples in this guide use it.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/syntaxhighlighter'.EXT;
			$file = \file_get_contents($example);
			$pubdir_index_contents = \file_get_contents(PUBDIR.'index'.EXT);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('pubdir_index_contents', $pubdir_index_contents)
			->render() ?>

		<p>When you also have html mixed in you want to specify
		<code>html-script: true;</code> as well.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/syntaxhighlighter-htmlscript'.EXT;
			$file = \file_get_contents($example);
			$pubdir_404_contents = \file_get_contents(PUBDIR.'404'.EXT);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('pubdir_404_contents', $pubdir_404_contents)
			->render() ?>

	</div>

</div>