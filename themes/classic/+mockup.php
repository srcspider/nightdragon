<? 
	namespace app;

	// do mockups of various theme elements here, you can then access them via 
	// the mockup route: /mockup/style
	
	$chosen_data = array
		(
			['title'=>'White', 'id' => 1], 
			['title'=>'Black', 'id' => 2],
			['title'=>'Gray',  'id' => 3],
			['title'=>'Red',   'id' => 4],
			['title'=>'Pink',  'id' => 5],
		);
?>

<div class="container">
	
	<h1>Mockups</h1>
	
	<p>You are currently viewing the mockup file. This file is used purely for testing</p>
	<p>You access the mockup file via <code>/mockup/ref</code></p>
	
	<hr/>

	<h2>SyntaxHighlighter Plugin</h2>
	
<pre class="brush: js;">
function test()
{
	$test = 12;
}</pre>

	<hr/>
	
	<h2>jQuery "Chosen" Plugin</h2>
	
	<?= $f = Form::i('twitter.general', $control->act('test')) ?>

		<?= $f->select('Bear', 'bear1')
			->values($chosen_data, 'id',  'title')
			->classes(['chzn-select']) ?>
	
		<?= $f->select('Bears', 'bear2[]')->attr('multiple', 'multiple')
			->values($chosen_data, 'id',  'title')
			->classes(['chzn-select']) ?>
	
		<div class="form-actions">
			<button class="btn" type="submit">Test</button>
		</div>

	<?= $f->close() ?>
		
</div>