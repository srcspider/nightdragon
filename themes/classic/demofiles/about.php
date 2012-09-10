<?
	/** @var $context \app\Context_About */

	namespace app;

	// H is an utility for managing headers
	$h = H::up(); # header level
?>

<div id="info">

	<<?= $h ?>>Mjölnir</<?= $h ?>>

	<p>Mjolnir is a flexible and unbiased, PHP framework focused on getting things done. It is designed
	to interoperate with virtually every piece of PHP code you can find, as well as be as simple,
	straight forward, customizable and overwritable as possible.</p>

	<p>Currently Mjölnir is in alpha, going by our
	<a href="https://github.com/ibidem/ibidem/blob/master/versioning.md">strict no-nonsense
	versioning rules</a>. Alpha here doesn't actually refer to the quality but how nobody has
	bothered releasing v1.0 (see: versioning for info). By common versioning conventions this
	would be known as a "perpetual beta" state. That being said, some caution is advised when
	using Mjölnir in it's current state with out some knowledge of it's internals.</p>

	<p>Mjölnir is <i>whatever you want it to be.</i> There is no core to the framework, it's just
	a series of modules you load that make it into what it is. If you don't like something you just
	don't load it or use something else. Don't like the structure, you can just make your own!
	In the case of serving web pages, for example, the framework applies the following stack:
	Access, HTTP, HTML, MVC. But maybe that doesn't make sense to you. With one configuration change
	you can have it do: Logger, ACL, HTTP, Application, DCI instead. Of course it can potentially
	not be a page request at all, Mjölnir doesn't care. Whatever you want, as long as it's within
	the scope of PHP as a language, you can make Mjölnir handle it for you in an organized way.</p>

	<<?= $h ?>>Themes in Mjölnir</<?= $h ?>>

	<p>Mjölnir is designed to handle web apps around themes.</p>

	<p>
		In other frameworks you may find views
		(the files within themes) to be very dumb files, usually for the sake of unit testing,
		but in Mjölnir by default <small class="muted">(you may change it if you wish)</small> views
		have a lot of power and control. The goal is to allow any number of themes to be made with no
		(or very minimal) intervention required from the programmers end, allowing designers to have full
		control over the files, and structure within the themes — with the exception of the configuration
		file <code>+theme.php</code> every single file and folder, along with which files make what page,
		is decided (entirely) by the designer and not some programming contract. </p>

	<p>By default themes also do not get raw data. They instead get hooks via a
		main context and are able to ask for what they need. One theme can have an element, while
		another might not, in which case any processing required for getting that element will be
		void as well. A theme can also spawn additional contexts from the main context it is given
		allowing it to insert elements that might be originally intended for other pages; this of
		course depends on how powerful it's main context is.
	</p>

</div>
