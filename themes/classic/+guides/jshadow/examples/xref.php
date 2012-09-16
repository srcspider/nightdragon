<div data-xref-scope>

	<table class="table">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Title</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($examples as $example): ?>
				<tr>
					<td><?= $example['id'] ?></td>
					<td><?= $example['title'] ?></td>
					<td>
						<?= $f = \app\Form::i('twitter.table-controls', $example['action']('erase')) ?>
							<?= $f->hidden('id')->value($example['id']) ?>
							<button class="btn btn-warning btn-mini"
									type="submit" data-xref-target="example-modal"
									data-backdrop="true"
									data-controls-modal="event-modal"
									data-keyboard="true"
									data-target="#example-modal"
									data-toggle="modal" <?= $f->sign() ?>>
								Delete
							</button>
						<?= $f->close() ?>
					</td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>

	<div class="modal hide fade"
		 id="example-modal"
		 tabindex="-1"
		 role="dialog"
		 aria-labelledby="add-units-owner-label"
		 aria-hidden="true">

		<div class="modal-body">
			<p>Are you sure you want to delete this entry?</p>
		</div>

		<div class="modal-footer">
			<button class="btn btn-primary btn-small" data-xref="example-modal">Yes</button>
			<button class="btn btn-small" type="button" data-dismiss="modal" aria-hidden="true">Cancel</button>
		</div>

	</div>

</div>