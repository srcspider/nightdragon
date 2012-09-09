<? 
	namespace app;

	# do mockups of various theme elements here, you can then access them via 
	# the mockup route: /mockup/style
?>

<div class="container">
	
	<p>You are currently viewing the mockup file. This file is used purely for testing</p>
	<p>You access the mockup file via <code>/mockup/ref</code></p>
	<hr/>

	<pre class="brush: js;">
	function test()
	{
		$test = 12;
	}
	</pre>
	
	<?= $f = Form::i('twitter.general', $control->act('test')) ?>

		<?= $f->select('Bear', 'bear[]')
			->values([['title'=>'White', 'id' => 1], ['title'=>'Black', 'id' => 2]], 'id',  'title')
			->classes(['chzn-select']) ?>
	
		<div class="form-actions">
			<button class="btn" type="submit">Test</button>
		</div>

	<?= $f->close() ?>
		
</div>