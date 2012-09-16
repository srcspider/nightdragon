<?
	namespace app;

	/* @var $context Context_Guide */
	/* @var $control Controller_Mockup */
	/* @var $theme   ThemeView */

	// view variables
	$id = isset($id) ? $id : 'mjolnir-html';

	$theme_base = \realpath(__DIR__.'/../../').DIRECTORY_SEPARATOR;
	$current_dir = \realpath(__DIR__).DIRECTORY_SEPARATOR;

	// headers
	$h1 = H::up($h);
	$h2 = H::up($h1);

	if ( ! \extension_loaded('tidy'))
	{
		throw new Exception
			('Please enabled the [tidy] extention in your [php.ini].');
	}

	function indent_html($html)
	{
		$clean = \tidy_parse_string($html, __DIR__.'/../tidy.tcfg');

		\tidy_clean_repair($clean);

		return $clean;
	}
?>

<div id="<?= $id ?>">

	<ul class="nav nav-tabs">
		<? foreach (['Base', 'Headers', 'Partials', 'Forms', 'Pagers'] as $topic): ?>
			<li><a href="#mjolnir-html-<?= $topic ?>"><?= $topic ?></a></li>
		<? endforeach; ?>
	</ul>

	<div id="mjolnir-html-Base">

		<<?= $h1 ?>>The Base</<?= $h1 ?>>

		<p>For reference almost all HTML related functionality is located in the
		HTML module, which is located at
		<code><?= \app\CFS::namespaces()['mjolnir\html'] ?></code>.</p>

		<p>As a convention, when starting any new view file the file should contain
		at the very least the <code>app</code> namespace.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/base-namespace'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p>If possible (and if it makes sense) the relevant context classes should be
		added in for autocomplete purposes.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/base-autocomplete'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p>Anything else you add is up to you.</p>

	</div>

	<div id="mjolnir-html-Headers">

		<<?= $h1 ?>>Headers</<?= $h1 ?>>

		<p>You can have the framework manage most of the headers for you.</p>

		<p>The recommended process is to declare all your header levels in the
		initial namespace block then use them.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/headers'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('h', $h1)
			->render() ?>

		<?
			$should_be_h1 = H::up($h1);
			$should_be_h2 = H::up($should_be_h1);
		?>

		<p>You should see <code>&lt;<?= $should_be_h1 ?>&gt;</code> and
		<code>&lt;<?= $should_be_h2 ?>&gt;</code>, because <code>$h</code> there is the
		current header for this section, which is an <code>&lt;<?= $h1 ?>&gt;</code>.</p>

	</div>

	<div id="mjolnir-html-Partials">

		<<?= $h1 ?>>Partials</<?= $h1 ?>>

		<p>A partial is a piece of a template that exists in it's own file.</p>

		<p>Most partials are simply files within the theme. We invoke them
		via the <code>$theme</code> object.</p>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars('<?= $theme->partial(\'path/to/file\')->render() ?>') ?></pre>

		<p>Here <code>path/to/file</code> is relative to the theme's root.</p>

		<p>Sometimes we want to pass variables to the partial, such as our header
		level. So let's say we're in the <code>$h3</code> level for our current
		file and we want to let the partial know it should start from there.
		We do this via the <code>variable</code> method.</p>

<pre class="brush: php; html-script: true;"><?= \htmlspecialchars
('<?= $theme->partial(\'path/to/file\')
	->variable(\'h\', $h3)
	->render() ?>') ?></pre>

		<p>Now the partial has access to <code>$h</code> so it can use
		<code>$h1 = H::up($h);</code> to set it's header levels.</p>

		<p>For theme partials some variables are passed automatically. These are
		<code>$theme</code>, <code>$context</code> and <code>$control</code></p>

		<p>Sometimes though we don't want theme partials, but external partials.
		Typically these are views provided by specialized modules. For example
		one such partial is the access form. If we need the access form we can
		just request it from the access module's view file.</p>

		<p>To get a view we simply use the <code>View</code> class. Just like
		with the <code>$theme</code> version we can pass variables to it, but in
		this case we don't need to.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/partials-views'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('h', $h1)
			->render() ?>

	</div>

	<div id="mjolnir-html-Forms">

		<ul class="nav nav-tabs">
			<li><a href="#mjolnir-html-Forms-general">General Info</a></li>
			<li><a href="#mjolnir-html-Forms-templates">Templates</a></li>
			<li><a href="#mjolnir-html-Forms-helptext">Help Text</a></li>
			<li><a href="#mjolnir-html-Forms-errors">Errors</a></li>
			<li><a href="#mjolnir-html-Forms-custom">Custom Rendering</a></li>
		</ul>

		<div id="mjolnir-html-Forms-general">
			<<?= $h1 ?>>Forms</<?= $h1 ?>>

			<p>To create a form you first need a <code>Form</code> object.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-object'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p>The object by itself is not very useful. So you want to specify at
			least the action and errors. The framework will provide errors via
			<code>$errors</code>, you only need to key it in.</p>

			<p>By convention we generally have the error key for a form as
			<code><span class="text-info">&lt;Model&gt;</span>.<span class="text-info">&lt;action&gt;</span></code>
			but variation may exist in cases of conflict. The key can actually be
			just about anything.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-basic-begining'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p>With the object configured we can start using it.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-simple'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<p>Using <code>$my_form</code> (ie. very explicit name) is sometimes
			required; but in this case it's just getting in our way. So by convention
			when it's not a problem we'll just use <code>$f</code> to represent
			form objects; just like we use <code>$i</code> and <code>$j</code> for
			iterators.</p>

			<p>Furthermore we can streamline the form process though a few shorthands.
			For one, we can chain form property setters because they all return the
			form object, so those 3 lines in the namespace block can just become
			<code>$my_form = Form::instance()->action('publish')->errors($errors['Book.publish']);</code>
			Next thing we can do is skip the <code>&lt;?= $my_form->open() ?&gt;</code> by
			just writing <code>&lt;?= $my_form ?&gt;</code> because the <code>__toString</code>
			method on the form will return the value of <code>$my_form->open()</code>.
			And since assignment returns the value assigned we can stick the entire
			form initialization on one line.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-simple-optimized'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<p>If we have more the one form this is of course far more manageable code.</p>

			<p>For now lets take a closer look at our form. More precisely let's
			look at the generated code.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-simple-optimized'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p>Ok looks good. But not what we want.</p>

			<p>First let's change the format of the submit.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-simple-refactored'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true; highlight: [19];"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<pre class="brush: php; html-script: true; highlight: [12];"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p>Looks better, but let's just go all out and give it the twitter bootstrap format.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-simple-twitter'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true; highlight: [13, 17, 21];"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<p>Okey so to recap. On line [13] we set the class for the form. On line
			[17] we set the template for the field. And on line [21] we changed our
			submit into a button and gave it the corresponding classes.</p>

			<p>All this configuration is getting really old really fast. So time for
			another shorthand.</p>

			<p>Field templates can actually be set at the form level. And you can
			even set which template each field should get. The framework refers to
			these as standards and all objects that incorporate standards follow
			the conventions of the <code>\mjolnir\types\Standardized</code>
			interface; which basically states there should be a <code>standard</code>
			method we can call to autoconfigure the object to that standard. Now we
			could do that but we can go one step further and use the shorthand for
			the object creation.</p>

			<p>So now our twitter example becomes a little bit more readable again.
			The <code>twitter.general</code> standard is provided by the framework;
			you can define your own via the <code>mjolnir/standard</code>
			configuration file.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-standardized'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<p>Now let's talk about fields.</p>

			<p>Text is not the only field type. You can have various others; here are
			just some.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-fields'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true; highlight: [15, 16, 17, 18]"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<p>You can also easily define your own.</p>

			<p>Among the mre specialized fields is the <code>select</code> field.</p>

			<p>The <code>select</code> field accepts many forms of data, but the
			most common is tabular data. To pass in a data from a table like
			structured array simply specify the id key and display key as the
			2nd and 3rd parameters on the values method.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-select'.EXT;
				$file = \file_get_contents($example);
				$publishers = array
					(
						[
							'id' => 1,
							'title' => 'Publisher 1',
						],
						[
							'id' => 2,
							'title' => 'Publisher 2',
						],
						[
							'id' => 3,
							'title' => 'Publisher 3',
						],
						[
							'id' => 4,
							'title' => 'Publisher 4',
						],
					);
			?>

			<pre class="brush: php; html-script: true; highlight: [14]"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->variable('publishers', $publishers)
				->render() ?>

			<p>Sometimes you want a field composed of multiple fields. In those
			cases you use a composite field. You can also specify a template via
			<code>format</code> to control how it's displayed as a single entity;
			with out affecting your general field template. In the example we
			don't really do anything with the format; just show it. You can
			ommit it and it will have the same value.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-composite'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<p>Note that you can have as many fields as you need in the composite.
			The method is a variable argument method, meaning it accepts any number
			of arguments.</p>
		</div>

		<div id="mjolnir-html-Forms-templates">

			<<?= $h1 ?>>Form Templates</<?= $h1 ?>>

			<p>The following is a reference of various ways of setting the field
			templates in your application.</p>

			<p>Note that (a lot of) the configuration shown bellow can be
			concentrated in a standard for easy change, use, etc.</p>

			<<?= $h1 ?>>Form Template Convention</<?= $h1 ?>>

			<p>All templates accept the following three variables: <code>:field</code>
			<code>:name</code>, <code>:errors</code>.</p>

			<ol>
				<li><p><code>:field</code> is the actual field, the most common being the
				input field but this can be a textarea, select, or some other field.</p></li>

				<li><p><code>:name</code> is the label of the field. An actual
				<code>&lt;label&gt;</code> tag will be generated and configured
				to point to the field.</p></li>

				<li><p><code>:help</code> is the help text position. <small class="muted">Help text is discussed
				in a separate section.</small></p></p></li>

				<li><p><code>:errors</code> are the errors of the field. <small class="muted">Errors are discussed
				in a separate section.</small></p></li>
			</ol>

			<p>This section discusses only templates in general. For the sake of
			bravity both errors and help text are ommited.</p>

			<<?= $h1 ?>>Customizing Fields</<?= $h1 ?>>

			<p>Let's pretend we want to have the following template for two field:
			<code><?= \htmlspecialchars('<tr><td>:field</td><td>:name</td></tr>') ?></code></p>
			<p>There are a few ways to go about it, each with it's own perks...</p>

			<<?= $h2 ?>>Just write it</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v0'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<<?= $h2 ?>>Set an explicit template on the field</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v1'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<<?= $h2 ?>>Store a variable, then set an explicit template on the field</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v2'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<<?= $h2 ?>>Load a partial, and use it as the template</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v3'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Partial</small></p>

			<?
				$example = $current_dir.'examples/partial/forms-template-example'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p>Of course you can also just have <code>:field</code> and
			<code>:name</code> in the partial but it's better with the variable
			placeholder since then it can be reused if direct input is necessary.</p>

			<<?= $h2 ?>>Set it as the form's field template</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v4'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<<?= $h2 ?>>Use a format group</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v5'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p>When the group ends the format is returned to whichever format was
			set previously. This does not prevent fields from having explicit
			format but it's useful when you want a big group of fields in a
			form to have a certain format.</p>

			<p>You may nest groupformats, in other groupformats, in other
			groupformats... The format will simply return up and fields will
			get the format of the closest parent fieldformat.</p>

			<<?= $h2 ?>>Explicitly set the format for only text fields</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v6'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p>You can mention any number of field types there and they will get the
			template when they are created via the form.</p>

			<<?= $h2 ?>>Use a standard definition</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v7'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">+App/config/mjolnir/form.php</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v7-standardfile'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php;"><?= \htmlspecialchars($file) ?></pre>

			<<?= $h2 ?>>Set it as the framework's default</<?= $h2 ?>>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v8'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">+App/config/mjolnir/form.php</small></p>

			<?
				$example = $current_dir.'examples/forms-template-v8-formfile'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php;"><?= \htmlspecialchars($file) ?></pre>

		</div>

		<div id="mjolnir-html-Forms-helptext">

			<<?= $h1 ?>>Help Text</<?= $h1 ?>>

			<p>Some fields require help text. To make it easy to add with out
			messing up templates the <code>:help</code> variable can be used.</p>

			<p>The process is as follows: you specify the position of the
			help block via <code>:help</code> in the field template, then
			specify a <code>helptemplate</code> for the field in which you again
			use the <code>:help</code> variable to specify where the actual text
			goes, and finally you specify the help text via the
			<code>help</code> method on the field.

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-helptext-v1'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= $gen ?>

		</div>

		<div id="mjolnir-html-Forms-errors">

			<<?= $h1 ?>>Form Errors</<?= $h1 ?>>

			<p>By default errors are displayed as a unordered list with the
			class <code>errors</code> immediately after the field.</p>

			<p><small class="muted">Note that in the case of composites
			"the field" is basically the combination of all the fields.</small></p>

			<p>Let's take a look at a basic example for reference.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-errors-v1'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->variable('errors', ['Book.publish' => [ 'title' => ['Title can not be empty.'] ] ])
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= $gen ?>

			<p>The first things we can do is set the location of the error, by
			specifing <code>:errors</code> in the template.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-errors-v2'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->variable('errors', ['Book.publish' => [ 'title' => ['Title can not be empty.'] ] ])
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= $gen ?>

			<p>The next basic operation we want to perform is to change the way
			errors are rendered.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-errors-v3'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->variable('errors', ['Book.publish' => [ 'title' => ['Title can not be empty.'] ] ])
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= $gen ?>

			<p>When designing a form always consider the possibility of multiple
			errors on the same field. If you want to display just one error
			(because of various style issues) you will need to specify a
			custom renderer that only prints the first error.</p>

			<p>Finally, here's how to do it at the form level.</p>

			<p><small class="muted">Example</small></p>

			<?
				$example = $current_dir.'examples/forms-errors-v4'.EXT;
				$file = \file_get_contents($example);
			?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

			<p><small class="muted">Generated</small></p>

			<? $gen = \app\View::instance()->file_path($example)
				->variable('control', $control)
				->variable('errors', ['Book.publish' => [ 'title' => ['Title can not be empty.'] ] ])
				->render() ?>

			<pre class="brush: php; html-script: true;"><?= \htmlspecialchars(indent_html($gen)) ?></pre>

			<p><small class="muted">Result</small></p>

			<?= $gen ?>

		</div>

		<div id="mjolnir-html-Forms-custom">

			<<?= $h1 ?>>Custom Rendering</<?= $h1 ?>>

			<p>Sometimes you have very different form rendering that might
			interact with some other features such as javascript validation,
			etc. It's impossible to account for every possible format combination
			in a single class so unfortunately if you need something that
			is not achieved with the current specification you'll have to
			add it in yourself.</p>

			<p>There are a few options.</p>

			<ol>
				<li><p>If it's something that's compatible with the current
				rendering you need only create the corresponding classes in
				one of your modules, extend the corresponding
				<code>\mjolnir\html</code> classes and add your
				functionality. Check the current field implementation for a
				reference; you can find it at
				<code><?= \app\CFS::namespaces()['mjolnir\html'] ?></code>.
				Some cases, such as simply a new input type can be very
				easy to implement since they only require setting the field
				<code>$type</code> and you're done.</p></li>

				<li><p>If the extra features breaks standard forms, you want to
				extend the fields in a different named class (eg.
				<code>FormField_BookText</code>), then extend <code>Form</code>
				to link your new field and you just use it instead of normal
				one. This is also recommended for custom fields that require a
				lot of attention to	work.</p></li>

				<li><p>If it's only specialized rendering, you can sometimes get
				away with just passing the form object or field object into a
				partial for processing. You have access from everywhere to the
				fields internal rendering methods such as
				<code>render_name</code>, <code>render_field</code>,
				<code>render_errors</code> which output the clean version of the
				field. Combine that with a partial and potentially some helper
				functions and you can avoid creating classes for it.</p></li>

			</ol>

		</div>

	</div>

	<div id="mjolnir-html-Pagers">

		<<?= $h1 ?>>Pagers</<?= $h1 ?>>

		<p>Pagers help with pagination.</p>

		<p>Similar to the <code>Form</code> class it's preferred if you do all
		formatting and configuration via a standard.</p>

		<p>Most of the time you'll recieve a pager from a method on
		<code>$context</code>. Something along the lines of
		<code>$context->pagination('page')</code> where <code>'page'</code> is
		optional and refers to the page query key. In our example we'll assume
		we get it via the <code>$pager</code> variable.</p>

		<p>Pagers can be reconfigured but it's preferred to have the configuration
		in the context file rather then the theme file. In particular pages, etc.</p>

		<p><small class="muted">Example</small></p>

		<?
			$example = $current_dir.'examples/pagers'.EXT;
			$file = \file_get_contents($example);
		?>

		<pre class="brush: php; html-script: true;"><?= \htmlspecialchars($file) ?></pre>

		<p><small class="muted">Result</small></p>

		<?= \app\View::instance()->file_path($example)
			->variable('control', $control)
			->variable('pager', \app\Pager::instance(69)->currentpage(2))
			->render() ?>

		<p>Yes that's it. Congratulations you've mastered pagers.</p>

	</div>

</div>