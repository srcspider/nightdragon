<?php return array
	(
		'standards' => array
			(
				'books.table-format' => function ($form)
					{
						$form->field_template('<tr><td>:field</td><td>:name</td></tr>');
					},
			),

	); # config
