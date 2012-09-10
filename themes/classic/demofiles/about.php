<?
	/** @var $context \app\Context_About */

	namespace app;

	// H is an utility for managing headers
	$h = H::up(); # header level
?>

<div id="info">

	<<?= $h ?>>Mjölnir</<?= $h ?>>

	<p>The Mjölnir framework is designed for working within the context of a team, not as an
	individual. But you can work just fine alone if you wish. Currently Mjölnir is in alpha going
	by our <a href="https://github.com/ibidem/ibidem/blob/master/versioning.md">strict no-nonsense versioning rules</a>.
	Alpha here doesn't actually refer to the quality but how nobody has bothered releasing v1.0
	(ie. documentation for various features is not present in full, etc). By common versioning this
	would be known as a "perpetual beta" state. Still, some caution is advised when using Mjölnir
	in it's current state with out some knowledge of it's internals.</p>

	<p>Mjölnir is a completely unbiased framwork. <i>It is whatever you want it to be.</i> There is
	no core to the framework, it's just a series of modules you load that make it into what it is.
	If you don't like something you just don't load it or use something else. By default for example
	in the case of serving web pages the framwork applies the following stack: Access, HTTP, HTML,
	MVC. But maybe that doesn't make sense to you. With one configuration change you can just have
	it do Logger, ACL, HTTP, Application, DCI (just as an example) instead. Maybe it's not a page
	request at all, maybe it's a console application: Console (it's usually just that). Whatever
	you want, as long as it's within the scope of PHP as a language, you can make Mjölnir handle it
	for you in an organized and efficient way.</p>


	<<?= $h ?>>Themes in Mjölnir</<?= $h ?>>

	<p>
		Mjölnir is designed to handle web apps around themes. In other frameworks you may find views
		(the files within themes) to be very dumb files, usually for the sake of unit testing,
		but in Mjölnir by default they have a lot of power and control, the goal being that once one
		theme is made any number of themes can be made with no (or very minimal) intervention required
		from the programmer end. Designers thus have full control over the files, and structure within
		the themes; with the exception of the configuration file <code>+theme.php</code> every single
		file and folder, along with which files make what page, is decided (entirely) by the designer
		and not some programming contract. Themes do not get raw data, they instead get hooks via a
		main context and are able to ask for what they need. A theme can have an element, while
		another might not, in which case any processing required for getting that element will be
		completely void as well. A theme can also spawn additional contexts from the main context to
		insert elements on pages that were previously only for other pages.
	</p>

</div>
