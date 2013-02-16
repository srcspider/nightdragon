<?
	namespace app;

	/* @var $theme   ThemeView */
	/* @var $context Controller_Demo */
	/* @var $control Controller_Demo */
?>

<div>
	<h2><?= Lang::key('demo:pages/home-title') ?></h2>
	<?= Lang::key('demo:pages/home', ['theme' => DOCROOT.'themes', 'modules' => DOCROOT.'modules']) ?>
</div>
