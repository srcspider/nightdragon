<?
	namespace app;

	/* @var $context Context_Guide */
	/* @var $control Controller_Mockup */
	/* @var $theme   ThemeView */

	// view variables
	$id = isset($id) ? $id : 'jshadow-help';

	$theme_base = \realpath(__DIR__.'/../../').DIRECTORY_SEPARATOR;
	$current_dir = \realpath(__DIR__).DIRECTORY_SEPARATOR;

	// headers
	$h1 = H::up($h);
	$h2 = H::up($h1);
?>

<div id="<?= $id ?>">

	<ul class="nav nav-tabs">
		<li><a href="#jshadow-info-tab">About Shadows</a></li>
		<? foreach (['ui', 'tabs', 'xlinker', 'saveme', 'xref'] as $shadow): ?>
			<li><a href="#<?= $shadow ?>-shadow-tab"><u><?= $shadow ?></u> shadow</a></li>
		<? endforeach; ?>
	</ul>

	<div id="jshadow-info-tab">

		<<?= $h1 ?>>jShadow</<?= $h1 ?>>

		<p>jShadow is a plugin factory. You use it for creating plugins. It will
		handle all the binding and various problems related to plugins such as
		scope and influence. The plugins are (for the most part) jquery plugins.</p>

		<p>To avoid confusion hereafter we'll use "shadow" to refer to "jquery plugins
		created via jshadow".</p>

		<p>Shadows do not require javascript code. You just use the pattern and it
		works.</p>

		<p>For clarity the support on forms for displaying errors has been
		ignored bellow and elements are only signed. Please refer to the forms
		guide for writing forms.</p>

		<p><small class="muted">Example shadow</small></p>

		<? $file = \file_get_contents($theme_base.'+scripts/src/+lib/mjolnir/shadows/ui.js') ?>

		<pre class="brush: js;"><?= \htmlspecialchars($file) ?></pre>

		<p>Every solution to an interface problem should be a plugin. If possible a shadow, unless
		you want to implement all the functionality in the jshadow script file yourself. See:
		<code><?= \str_replace('/', DIRECTORY_SEPARATOR, $theme_base.'+scripts/src/+lib/mjolnir/')
				.'jshadow-<span class="text-info">&lt;version&gt;</span>.js' ?></code>
		The shadow files should not be versioned in the file name, but should contain a
		<code>@version 1.0</code> in the file itself; see example above.</p>

	</div>

	<div id="ui-shadow-tab">

		<<?= $h2 ?>><u>ui</u> shadow</<?= $h2 ?>>

		<p>The <code>ui</code> shadow is used for in-html view changes.</p>

		<p>You first wrap your code in <code>data-ui</code> and specify a default state, in most
		cases that state will be <code>default</code>. You then specify <code>data-ui-view</code>
		on elements. If an element is not in the current scope of the <code>data-ui</code> wrapper
		it will be hidden, otherwise it will show. You may specify more then one value. You then
		specify <code>data-ui-show</code> on buttons or similar elements. When the element is
		clicked the value of <code>data-ui-show</code> will become the new value for
		<code>data-ui</code> and all <code>data-ui-view</code> elements will change accordingly.

		<p>You need to specify a class to hide elements	while javascript is loading. The class in
		question should only do a <code>display: none;</code> (note that bootstrap
		<code>.hidden</code> affects visibility too). In the example we used <code>off</code>
		but you can use your own.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/ui'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?
			$todos = array
				(
					[
						'todo' => 'Feed the cat...',
						'when' => 'NOW (poor bastard\'s almost dead)',
					],
					[
						'todo' => 'Go vote',
						'when' => 'later',
					],
					[
						'todo' => 'find music',
						'when' => 'in 5min',
					],
				);
		?>

		<?= \app\View::instance()->file_path($example)
			->variable('todos', $todos)
			->variable('control', $control)
			->render() ?>

	</div>

	<div id="tabs-shadow-tab">

		<<?= $h2 ?>><u>tabs</u> shadow</<?= $h2 ?>>

		<p>Given the typical bootstrap tab structure this shadow will add tab
			support.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/tabs'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->render() ?>

	</div>

	<div id="xlinker-shadow-tab">

		<<?= $h2 ?>><u>xlinker</u> shadow</<?= $h2 ?>>

		<p>When a element is clicked, the cross-linker will click on all
			out-of-scope elements with the same name.</p>

		<p>You specify a scope via <code>data-xlink-scope</code>. Then specify
		actions via <code>data-xlink</code> and targets (to be clicked) via
		<code>data-xlink-click</code>.</p>

		<p>Try opening both forms in the example bellow.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/xlinker'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->render() ?>

	</div>

	<div id="saveme-shadow-tab">

		<<?= $h2 ?>><u>saveme</u> shadow</<?= $h2 ?>>

		<p>This shadow displays a help block to warn the user he has unsaved
		changes in the form. Useful for updates; or when the display is a form.</p>

		<p>You specify a scope via <code>data-saveme</code>. Then specify
		help text via <code>data-saveme-msg</code>.</p>

		<p>When a field changes you get the message.</p>

		<p><small class="muted">Example</small></p>

		<?
			$fields = ['given_name' => 'Alice', 'family_name' => 'Evesdropper'];
			$example = $current_dir.'examples/saveme-1'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('fields', $fields)
			->render() ?>

		<p>Of course there are more creative ways to use it. How about we make the buttons the message?</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/saveme-2'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('fields', $fields)
			->render() ?>

	</div>

	<div id="xref-shadow-tab">

		<<?= $h2 ?>><u>xref</u> shadow</<?= $h2 ?>>

		<p>The cross-reference shadow allow's the linking between the element
		that is clicked and the element that in expected to be clicked. The most
		typical application is a "Are you sure?" model. When you click the delete
		button you want the "Yes" in the model to refer to the delete button's
		form.</p>

		<p>You specify a scope via <code>data-xref-scope</code>. Then specify
		the references via <code>data-xref</code> and target via
		<code>data-xref-target</code>.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/xref'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?
			$examples = array
				(
					[
						'id' => 1,
						'title' => 'Alice',
						'action' => Make::action()
					],
					[
						'id' => 2,
						'title' => 'Bob',
						'action' => Make::action()
					],
					[
						'id' => 3,
						'title' => 'Eve',
						'action' => Make::action()
					]
				);
		?>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('examples', $examples)
			->render() ?>

	</div>

</div>