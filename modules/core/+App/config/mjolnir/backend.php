<?php return array
	(
		'The Source Spider' => array
			(
				'post-new' => array
					(
						'icon' => 'file',
						'title' => 'New Post',
						'context' => '\app\Backend_Post',
						'view' => 'the-source-spider/backend/post-new'
					),

				'post-edit' => array
					(
						'hidden' => true,
						'title' => 'Edit Post',
						'context' => '\app\Backend_Post',
						'view' => 'the-source-spider/backend/post-edit'
					),

				'post-index' => array
					(
						'icon' => 'book',
						'title' => 'Posts',
						'context' => '\app\Backend_Post',
						'view' => 'the-source-spider/backend/post-index'
					),
			)
	);