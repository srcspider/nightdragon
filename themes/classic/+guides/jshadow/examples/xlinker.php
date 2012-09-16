<div class="well">

	<?= $f = \app\Form::i('twitter.general', $control->action('new-alice')) ?>
	<?= $f->close() ?>
	<div data-xlink-scope data-ui="default">

		<table class="table">
			<tbody>
				<tr>
					<td>Eve</td>
					<td>123-4567-89</td>
				</tr>
				<tr data-ui-view="new">
					<td><input name="name" type="text" <?= $f->sign() ?>/></td>
					<td><input name="number" type="text" <?= $f->sign() ?>/></td>
				</tr>
			</tbody>
		</table>

		<div data-ui-view="default">
			<button class="btn" data-xlink="cleanup" data-ui-show="new">Add New</button>
		</div>

		<div data-ui-view="new">
			<button class="btn" type="submit" <?= $f->sign() ?>>Save</button>
			<button class="btn" data-xlink-click="cleanup" data-ui-show="default">Cancel</button>
		</div>

	</div>

	<br/>

	<?= $f = \app\Form::i('twitter.general', $control->action('new-bob')) ?>
	<?= $f->close() ?>
	<div data-xlink-scope data-ui="default">

		<table class="table">
			<tbody>
				<tr>
					<td>Bob</td>
					<td>987-6543-21</td>
				</tr>
				<tr data-ui-view="new">
					<td><input name="name" type="text" <?= $f->sign() ?>/></td>
					<td><input name="number" type="text" <?= $f->sign() ?>/></td>
				</tr>
			</tbody>
		</table>

		<div data-ui-view="default">
			<button class="btn" data-xlink="cleanup" data-ui-show="new">Add New</button>
		</div>

		<div data-ui-view="new">
			<button class="btn" type="submit" <?= $f->sign() ?>>Save</button>
			<button class="btn" data-xlink-click="cleanup" data-ui-show="default">Cancel</button>
		</div>

	</div>

</div>