<div class="well" data-ui="default">

	<?= $f = \app\Form::i('twitter.general', $control->action('new-todo')) ?>
	<?= $f->close() ?>

	<table class="table">
		<thead>
			<tr>
				<th>Todo</th>
				<th>When</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($todos as $todo): ?>
				<tr>
					<td><?= $todo['todo'] ?></td>
					<td><?= $todo['when'] ?></td>
				</tr>
			<? endforeach; ?>
			<tr class="off" data-ui-view="new">
				<td><input name="todo" type="text" <?= $f->sign() ?>/></td>
				<td><input name="when" type="text" <?= $f->sign() ?>/></td>
			</tr>
		</tbody>
	</table>

	<div data-ui-view="default">
		<button id="test-add-button" class="btn" data-ui-show="new">Add New</button>
	</div>

	<div class="off" data-ui-view="new">
		<button class="btn" type="submit" <?= $f->sign() ?>>Save</button>
		<button class="btn" data-ui-show="default">Cancel</button>
	</div>

</div>