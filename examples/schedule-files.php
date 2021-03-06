<?php 

include_once(dirname(dirname(__FILE__)) . '/src/SandCage.php');

use SandCage\SandCage;

$sandcage = new SandCage;

$payload = array(
	'jobs'=>array(
		array(
			'url'=>'http://cdn.sandcage.com/p/a/img/logo.jpg',
			'tasks'=>array(
				array(
					'actions'=>'save'
				),
				array(
					'actions'=>'resize',
					'filename'=>'hello_world.jpg',
					'width'=>200
				),
				array(
					'actions'=>'crop',
					'coords'=>'10,10,50,50'
				),
				array(
					'reference_id'=>'1234567890',
					'actions'=>'rotate',
					'degrees'=>90
				),
				array(
					'actions'=>'cover',
					'width'=>60,
					'height'=>60,
					'cover'=>'middle,center'

				)
			)
		),
		array(
			'url'=>'http://cdn.sandcage.com/p/a/img/header_404.png',
			'tasks'=>array(
				array(
					'actions'=>'resize',
					'height'=>30
				)
			)
		)
	)
);

$sandcage->call('schedule-tasks', $payload);
// $sandcage->call('schedule-tasks', $payload, 'http://www.example.com/callback_url'); // Same call with the optional callback endpoint set

if ($sandcage->status['http_code'] == 200) {
	echo $sandcage->response;
} else {
	echo "An error occurred.";
}
