<?php
header('Content-type:application/json;charset=utf-8');

$answer=[
			[
				'_id'=>'1',
				'Nombre'=>'Edgar',
				'Facultad'=>'ITT',
				'Status'=>'True'

			]


		];

//echo '[{"Nombre":"pepe"}]';
		echo json_encode($answer);

?>


skip-grant-tables