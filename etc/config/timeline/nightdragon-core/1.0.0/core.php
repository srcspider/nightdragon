<?php return array
	(
		'configure' => array
			(
				'tables' => array
					(
						\app\PostLib::table(),
					),
			),

		'tables' => array
			(
				\app\PostLib::table() =>
					'
						id :key_primary,

						title    :title,
						body     varchar(25000),
						posttime :datetime_required,
						posted   :boolean DEFAULT FALSE,

						PRIMARY KEY(id)
					',
			),

	); # config
