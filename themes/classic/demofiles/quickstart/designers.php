<?
	namespace app;

	// shorthand directory separator
	$ds = DIRECTORY_SEPARATOR;
	// H is an utility for managing headers
	$h = H::current(); # header level
	// we store the highlighter settings; we got variables, we use them ;)
	$php_highlighter = 'brush: php; html-script: true;';
	$mockup_ref = URL::href('\mjolnir\theme\mockup', ['target' => 'guide']);
?>

<p>This is a mockup guide, if you are looking for a (mockup) reference see:
<a href="<?= $mockup_ref ?>"><?= $mockup_ref ?></a></p>

<<?= $h ?>>Quick-Start for Designers</<?= $h ?>>

<p class="muted"><small>(worst case is assumed; please ignore the parts that do not apply to you)</small></p>



<p>Mjölnir is designed for modern web apps so a few assumtions are made:</p>

<ol>
	<li>everyone knows how to write (basic) javascript, and therefor...</li>
	<li>everyone knows very simple and basic programming; where basic programming is as follows...</li>
	<li>everyone knows how to write a function and variables</li>
	<li>everyone knows how to call a function <small class="muted">(knowledge on library functions is not assumed)</small></li>
	<li>everyone knows how to call methods on a class/object (given one)</li>
	<li>everyone knows what arrays are</li>
	<li>everyone knows what a <code>if</code>, <code>for</code> and <code>foreach</code> is
	<li>everyone knows how to work with strings, numerals and do basic math and other operations</li>
</ol>

<p>
	As far as the framework is concerned if you don't meet those assumtions you should stay the
	hell away from the code! Loose and shady code (in the theme files) will just result in more
	work later, <strong>a lot!</strong> more then if you didn't touch the code at all. Any code
	that is written needs to be fully functional. To be clear: no html where generated code should
	be, no mockups, no placeholders, etc within the themes. Everything you write needs
	to be <strong>final</strong>!
</p>

<p>
	When you fail to meet this the programmer has to go in and throw out your unusable code,
	then stick in the correct version to make it work. After he does all that, it's very likely
	some things broke all over due to the change, so now you have to go in and fix things. So
	the cost to do it is now 3 times what it would have been if your code didn't need to be
	re-touched two times! Needless to say there's also a lot of pointless logistics involved
	with this sort of mess, so it's in everyone's best interest to make sure it never happens,
	or at least when it does happen that the programmer has to go in your code to fix/change
	something (function, paramters), you don't have to go in after him, and there's no
	"throwing out code" involved, just tweaking.
</p>

<<?= $sub = H::up($h) ?>>Workflow Checklist</<?= $sub ?>>

<<?= $checklist = H::up($sub) ?>>Prerequisites</<?= $checklist ?>>

<p>First off, you should start all your (view) files with this namespace declaration:</p>

<pre class="<?= $php_highlighter ?>">
&lt;? namespace app; ?&gt;
</pre>

<p><small>Don't get what it does? You don't need to, just copy/paste it.</small></p>

<p>If you need to write some code like functions etc to help you in the file you should place it
there right after the namespace declaration. Example:</p>

<pre class="<?= $php_highlighter ?>">
&lt;?
	namespace app;

	// calculate the page limit of something
	$pagelimit = isset($_GET['pagelimit']) ? $_GET['pagelimit'] : 1;
	// don't like $context, shortening to $c
	$c = $context
?&gt;
</pre>

<p>Using an IDE? Write it something like this to (hopefully) have code completion:</p>

<pre class="<?= $php_highlighter ?>">
&lt;?
	namespace app;

	/* @var $context Context_MyContext */
?&gt;
</pre>
<p class="muted pull-right"><small><span class="label label-info">Tip!</span> For the NetBeans IDE the <code>namespace app;</code> part <b>must</b> come first; or it won't work.</small></p>

<br class="clearfix" />


<<?= $checklist ?>>Globals you have access to</<?= $checklist ?>>

<p>Within the view files you have access to the following special variables:</p>

<ol>
	<li>
		<code>$context</code> an object of the current context's class; you call methods from
		it to get everything on the page. Yes, <b>everything</b>. You should <b>not</b> be calling anything
		else to get data, unless it's something you obtained via <code>$context</code>, or in
		some way obtained using context.
	</li>

	<li>
		<code>$theme</code> is the current theme. 99% of the time you use it for one
		thing only <code>&lt;?= $theme->partial('components/some_file')->render() ?&gt;</code>
		which, just as it reads, loads a partial into the current view, ie. something that
		repeats or is a reusable piece of code.
	</li>
</ol>
<p>And that's it.</p>
<br/>
<p>
	Well not really, there are a few more, but they're rarely used, you can just ignore them if
	you don't understand them now...
</p>
<ul>
	<li>
		<code>$view</code> is a special variable that's only available when the file is a template.
		Basically <code>$view</code> refers here to the next file in a template chain. Which is to say if the
		current file is meant to act as a template that you use in your <code>+theme.php</code>
		file when declaring which files a target uses, then you write
		<code>&lt;?= $view->render() ?&gt;</code> where you want the file for which this file
		acts like a template to go in. Lost you? just look at how the target
		<code>frontend</code> is defined currently in the demo files and you'll get it. And yes,
		you don't use view for anything else.
	</li>

	<li>
		<code>$control</code> gives you access to the current control object. In the typical MVC
		structure this is of course the Controller that's handling the request, but it can be
		just about anything. You don't know, and shouldn't care. 99% of the time you just
		use this for <code>$control->action('something')</code> which gives you the URLs for
		forms. It's very rare for you to use it for anything else, so you can just about forget
		about it.
	</li>
</ul>

<<?= $checklist ?>>Properly writing a placeholder</<?= $checklist ?>>

<p>On almost any site you have a h1 with a link</p>

<p>Here's how <b>not to do it</b>.</p>

<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars('<h1><a href="/something">Lorem Ipsum</a></h1>') ?>
</pre>

<p>Simple rule of thumb: <span class="text-info">if the code is <u>not final</u>, <u>it is wrong</u>.</span></p>

<p>
	It's very easy to think	that just because "Lorem Ipsum" is an obvious placeholder (to you)
	it must be obvious to everyone else. But the truth is unless you're part of the <i>department
	of redundancy department</i>, there is nobody assigned to
	"checking for placeholders", so what happens is the header gets image replaced and now bam!
	it's invisible and unless someone goes though your code with a fine-tooth comb (more wasted
	time) it's not going to get spotted until it's embarrassing. But lets go back and assume,
	for the sake of the example that there is no replacement there and it is indeed easily
	spotted. Who's going to tell that <code>/something</code> is a placeholder (assuming it
	works for everybody but doesn't in production). Well, nobody. This isn't just a problem
	with links, it can also easily happen on alt attributes and title attributes, etc. It can
	also happen easily on elements hidden via css, or that appear on only in certain conditions.
</p>

<p>Here's another <b>wrong version</b>, this one more likely if you're leaning on some programming
	experience.</p>

<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars('<h1><a href="<?= URL::href(\'frontend\') ?>"><?= $context->site_title() ?></a></h1>') ?>
</pre>

<p>
	The problem here is that you are making the unfounded assumtion the URL of the thing you want
	accepts the parameters you think it does (in this case none). It is very often the case
	that URL's change drastically (none the exception). In the theme files it's (very) good
	practice to stay independent of any application logic. All the theme should do is ask and
	process data, nothing more.
</p>

<p>The correct version is thus as follows:</p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars('<h1><a href="<?= $context->site_url() ?>"><?= $context->site_title() ?></a></h1>') ?>
</pre>
<p>
	Translated to English the code reads as follows: "Create Heading 1 with an anchor (ie. hyperlink) in it that
	points to <code>site_url</code> and has the text <code>site_title</code>.". Sill confused? Well it's time
	to flex those google skills (ie. copy paste keywords from the above and you should get it... from googling).
</p>

<blockquote>
  <p>"But how do I know of <i>site_title</i> and <i>site_url</i>??"</p>
</blockquote>

<p>
	It's simple. You <b>don't</b>! There is no need for them to exist prior to you using them.
	Actually it's better if they don't exist and are created as a result of them being used.
	It's far more productive for the programmers to implement things that <b>we know need to
	be there</b>, rather then things <b>we think need to be there</b>. So, as long as it
	doesn't involve getting html just write <code>$context->whatever_the_heck_you_need()</code>
	<small>(replace with relevant name)</small> whenever you're tempted to place a placeholder.
</p>

<<?= $checklist ?>>Previewing our designs</<?= $checklist ?>>

<p>One problem with development in parallel is that design tends to move relatively fast, compared
to the code that makes it work (sometimes). While on the programming side you can just code it
and tie it in later, on the design side it's a little more inconvenient.</p>

<p>The simple solution to the problem is to just use mockups.</p>

<p>Basically you take your file and write a little bit of code to inject bogus data into it,
so even if it doesn't work now, you can show it and the design works. Of course following our
little rule set previously the bogus data code <b>should not</b> and <b>must not</b> be in
our theme files. The theme files are <b>final</b>!</p>

<? $mockup_example = $context->mockup_example() ?>
<p>
	So here comes the mockup feature to the rescue. To view a bogus version of any file, simply
	call it's target via <code>/mockup/</code>. So for example this very page is
	<a href="<?= $mockup_example ?>"><?= $mockup_example ?></a>. You might notice that it looks
	pretty much the same. That's because there is currently an implementation for the context
	and by default the mockup will grab the real context if it can get it. A lot of the time
	we don't want this however, so to force the system to ask for the actual fake version go
	to your <code><?= PUBDIR.'config'.EXT ?></code> file and change
	<code>'mockup-ns' => 'app',</code> to <code>'mockup-ns' => 'mockup',</code>. To clarify
	<code>app</code> refers to the universal top namespace and <code>mockup</code> is simply
	the namespace used by the mockup module in the demo, if you used a different namespace
	for your mockup module you would have had to insert that there instead. <b>If you don't get it
	it's fine!</b> just think of it as a switch where <code>app</code> means "get real data if you
	can" and <code>mockup</code> means "always fake it".
</p>

<p>After changing you should notice now when accessing
<a href="<?= $mockup_example ?>"><?= $mockup_example ?></a> you get the error
<code>Fatal error: Class '\mockup\Context_Start' not found [...]</code>. This is good!
It means you're trying to access the mockup version (as you can tell by the name); but the mockup
doesn't exist yet.</p>

<p>So here's how you create the mockup version:</p>

<ol>
	<li>
		<p>Open a console <small class="muted">(we recomend <b>git bash</b>)</small> and navigate to <code><?= DOCROOT ?></code> (ie. the project root)</p>
	</li>
	<li>
		<p>Within the project root you have access to the <code>order</code> utility; feel free to type <code>order</code> to access help</p>
		<p><small><span class="label label-info">Troubleshooting</span> if the command fails try <code>./order</code> or <code>php order</code>, should these fail too it means you are missing php on the system path </small></p>
	</li>
	<li>
		<p>Now ask the system to create the class for you by typing <code>order make:class --class <span class="text-info">&lt;missing-class&gt</span></code></p>
		<p>For our missing class this would be: <code>order make:class --class '\mockup\Context_About'</code> <small class="muted">(as per the error)</small></p>
	</li>
	<li>
		<p>You're now halfway there. If you now try to access <a href="<?= $mockup_example ?>">the mockup page</a> you should see the page, roughly.</p>
		<p>Should you scroll down you will find a error <code>Fatal error: Call to undefined method mockup\Context_Start::mockup_example() [...]</code></p>
		<p>Basically it's telling us <code>mockup_example</code> doesn't exist in our new <code>Context_About</code> class. <small class="muted">(see last part of error)</small></p>
	</li>
	<li>
		<p>
			Let's fix it. Go to your new mockup context located at
			<code><?= DOCROOT.'modules'.$ds.'+mockup'.$ds.'Context'.$ds.'About'.EXT; ?></code>
			and add the create a function that returns bogus data.
		</p>
		<p>Here's an example:</p>
		<p><pre class="brush: php">function mockup_example() { return '//loremipsum'; }</pre></p>
		<p>And here's a more sophisticated example:</p>
		<p>
		<pre class="brush: php">function mockup_example() { return \app\Make::url(); }</pre></p>
		<p>And here's an even more sophisticated example:</p>
		<p>
<pre class="brush: php">
function mockup_example()
{
	// create a bogus URL that points to the about mockup
	return \app\Make::url('about');
}</pre>
		</p>
	</li>
</ol>

<p>And you're done. The about mockup should now be working.</p>

<<?= $checklist ?>>The often forgotten rules</<?= $checklist ?>>

<p>There are a few rules one should abide by when making a design:</p>

<ol>
	<li><p>There is almost always an <span class="text-info">blank</span> state.</p></li>
	<li><p>There is almost always an <span class="text-info">error</span> state.</p></li>
	<li><p>Both the error and blank state are just as important as the normal state.</p></li>
</ol>

<p>
	If a design is missing handling for those states, it is not final! and thus will require
	re-touching.
</p>

<p>The next sections will cover blank and error states for the common cases.</p>

<<?= $checklist ?>>Loops</<?= $checklist ?>>

<p>This is <b>wrong</b>:</p>

<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars
('<ul>
	<li><a href="#">fasfasfa</a></li>
	<li><a href="#">asdafasf</a></li>
	<li><a href="#">asfasfas</a></li>
	<li><a href="#">tefasfasst1</a></li>
	<li><a href="#">fasfa</a></li>
	<li><a href="#">fasfasf</a></li>
	<li><a href="#">fasfas</a></li>
	<li><a href="#">fasfasfasfasf</a></li>
</ul>') ?>
</pre>

<p>This is <b>almost</b> correct code: <small class="muted">(ie. not handling blank state)</small></p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars
('<ul>
	<? foreach ($context->entries() as $entry): ?>
		<li><a href="<?= $entry[\'url\'] ?>"><?= $entry[\'title\'] ?></a></li>
	<? endforeach; ?>
</ul>') ?>
</pre>

<p>This is <b>correct</b> and final code:</p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars
('<? $entries = $context->entries() ?>
<? if ( ! empty($entries)): ?>
	<ul>
		<? foreach ($entries as $entry): ?>
			<li><a href="<?= $entry[\'url\'] ?>"><?= $entry[\'title\'] ?></a></li>
		<? endforeach; ?>
	</ul>
<? else: # blank state ?>
	<p class="alert alert-info">
		Currently there are no entries.
		Be the first to add some by using the controls at the top.
	</p>
<? endif; ?>') ?>
</pre>
<p>
	As the example shows, you should use the blank state of your application as a tutorial
	pointing your users to where they need to go. If you do not treat the blank state properly
	your users are more likely to just go somewhere else rather then build on your app. In
	the example we left a simple message; in a real app some graphical pointers are much better.
</p>

<p><small class="muted"><span class="label label-info">Hint</span> Just in case it's not obvious, for the example case the blank state and error state are actually
one and the same.</small></p>

<p>The mockup code for the above would look something like this:</p>
<pre class="brush: php;">
<?= \htmlspecialchars
('function entries()
{
	$entry = array
		(
			\'title\' => \app\Make::title(),
			\'url\' => \app\Make::url(),
		);

	return \app\Make::copies($entry);
}') ?>
</pre>

<<?= $checklist ?>>Forms</<?= $checklist ?>>

<p>This is <b>wrong</b>:</p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars
('<form>
	<div>

		First Name <input type="text" />
		Last Name <input type="text" />
		Tel <input type="text" />
		Password <input type="password" />
		<div class="form-actions">
			<button>Request Membership</button>
		</div>
	</div>
</form>') ?>
</pre>

<p>It's not functional. It ignores the error state for fields. It's not accessible. Etc.</p>

<p>Here's the <b>correct</b> version:</p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars
('<?= $f = Form::i(\'twitter.general\', $control->act(\'signup\')) ?>
	<fieldset>

		<?= $f->text(\'First Name\', \'given_name\') ?>
		<?= $f->text(\'Last Name\', \'family_name\') ?>
		<?= $f->text(\'Tel\', \'telephone\') ?>
		<?= $f->password(\'Password\', \'password\') ?>

		<div class="form-actions">
			<button class="btn btn-primary btn-large" type="submit" <?= $f->sign() ?>>
				Request Membership
			</button>
		</div>
	</fieldset>
<?= $f->close() ?>') ?>
</pre>

<p>
	No mockup is required unless you call context (which we don't) to populate some element
	in the form, such as a select. The form generates everything from labels to tabindex, form
	attributes as well as managed all the useless cruft that comes with the form.
</p>

<p>For example the form above generates the following just for the First Name field.</p>

<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars
('<div class="control-group">
	<span class="control-label">
		<label for="form_0_2">First Name</label>
	</span>
	<div class="controls">
		<input id="form_0_2" name="given_name" type="text" tabindex="2"/>
	</div>
</div>') ?>
</pre>
<p>
	And that's just in the non-error state and with everything on default. You can customize
	all your forms from a single configuration file, changing the way all of them render. To do this
	just create your own "standard" (in a <code>mjolnir/forms</code> config) and use it in the
	place of <code>twitter.general</code>.
</p>

<<?= $checklist ?>>Pagination</<?= $checklist ?>>

<p>Surprisingly hard to make a good one. Thus, preferably (so as to handle all the edge cases)
simply use the Pager class to get the job done.</p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars('<?= $context->pagination()->standard(\'twitter\')->render() ?>') ?></pre>
<p>And here's how to make a quick mockups</p>
<pre class="brush: php">function pagination()
{
	return \app\Pager::instance()->totalentries(\rand(0, 1000);
}</pre></p>

<p>If you want the pager not to show for 0 or 1 pages of data, simply do:</p>
<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars('<? $pager = $context->pagination() ?>
<? if ($pager->total_pages() >= 2): ?>
	<?= $context->pagination()->render() ?>
<? endif; ?>') ?></pre>

<<?= $checklist ?>>HTML5 tags</<?= $checklist ?>>

<p>
	At the time of this writing HTML5 tags, ie. <code>&lt;article&gt;</code>, <code>&lt;section&gt;</code>
	<code>&lt;nav&gt;</code>, etc, are completely useless and should be avoided!
</p>



<p>Here's an example of some basic markup:</p>

<pre class="<?= $php_highlighter ?>">
<?= \htmlspecialchars('<section>
	<nav>
		<ul>
			...
		</ul>
	</nav>
	<article>
		...
	</article>
</section>') ?></pre>

<p>What most people think:</p>
<ul>
	<li><p>They were created by the W3C</p></li>
	<li><p>They help search engines navigate your site</p></li>
	<li><p>They help people with screen readers</p></li>
	<li><p>Their purpose is to logically structure your site</p></li>
</ul>

<p>The <b>sad truth</b>:</p>
<ul>
	<li><p>They were created by the HTML5 editor (before the HTML5 working group collaborated with W3C)</p></li>
	<li><p>Search engines don't care! If you want to mark data for search engines refer to <a href="http://schema.org/">schema.org</a></p></li>
	<li>
		<p>Screen readers don't understand them. Proper use of h1 to h6 and other techniques is still
			the best way to help screen readers. If you want to go the extra mile what you want to do
			is use <a href="http://www.w3.org/WAI/intro/aria.php">WAI-ARIA</a> landmark roles, such as
			<code>navigation</code> as well as avoid useless garbage text. For example a typical error
			in validation is the requirement for alt text on img tags. This is commonly misinterpreted
			as "mssing a verbose description of the image image", but it's really just that you should
			have an alt attribute, so <code>alt=""</code> is actually perfectly fine, and in the case
			of purely visual ques such as avatars the correct way to write it, since why would someone
			using a screen reader care to be reminded of "Avatar of WhatsHisName" every other sentence.
		</p>
	</li>

	<li>
		<p>Their (original, intended) purpose is to replace <code>div</code> tags with an equivalent
			id attribute. <small class="muted">(yes you've read that right)</small></p>
		<p>So <code>&lt;nav&gt;</code> is meant to be just syntax sugar for
			<code>&lt;div id="nav"&gt;</code>, nothing more.</p>
	</li>
</ul>

<p>For managing heading levels the <code>H</code> class can be used. See this very file, located at
<code><?= __FILE__ ?></code>, for an example.</p>

<<?= $sub ?>>Common Gotchas</<?= $sub ?>>

<table class="table">
	<tbody>
		<tr>
			<td>How do I compile my style/scripts?</td>
			<td>
				Just run the <code>+start.rb</code> files in your style and scripts directories. <br/>
				You'll need ruby on the system to run them, go grab it at <a href="http://www.ruby-lang.org/en/">http://www.ruby-lang.org/en/</a><br/>
				You'll of course need compass/sass too, after installing ruby open a console and run <code>gem install compass</code>.
			</td>
		</tr>
		<tr>
			<td>
				I have a file <code>some_page.php</code>, but when I access
				<code>mockup/some_page</code> to see the output it doesn't show!
			</td>
			<td>
				The <code>mockup/*</code> URL expects a target not a file, so you need to create
				a target <code>some_page</code> that uses the file <code>some_page.php</code> to
				view a mockup for it.
			</td>
		</tr>
		<tr>
			<td style="width: 30%">Style doesn't show!</td>
			<td>
				Have you complied the code? <br/><small><span class="label label-info">hint</span> run the <code>+start.rb</code> files.</small>
			</td>
		</tr>
		<tr>
			<td>Styles used to work but don't anymore!</td>
			<td>
				By default the entire project is setup to ignore all compiled files. Makes life
				easier for people working with source versioning. If you copy/clone/etc a project
				make sure to re-run all the <code>+start.rb</code> files. This only applies for
				main themes, themes in modules do actually come with all the files compiled.
			</td>
		</tr>
		<tr>
			<td>Javascript doesn't work!</td>
			<td>
				Check for errors in the compiler window (that's the same one with the
				autocompiler, ie. the one from <code>+start.rb</code>). You can also check the
				console window in your browser for <code>[ERROR]</code> blocks. When something
				bad happens the theme system will output a javascript printing errors instead of
				the actual javascript. If you're using Chrome go into your dev tools options (hit inspect
				first) and enable source maps. You will then see all the javascript files in
				clear unminified form. You can now check to see where and why your javascript
				failed. If you don't see them and don't see a <code>[ERROR]</code> tag please
				check the file's URL for the error and drop it to the programmers; this case is
				very very rare if nonexistent but is always a posibility if sloppy code makes
				it into the project.
			</td>
		</tr>
	</tbody>
</table>

