<?php

	error_reporting(0);
	header('Content-type:application/json;charset=utf8');

	function getPDO(){
		try {
		$conexion = new PDO('mysql:host=localhost;dbname=pruebamicro', 'root', '101@Dunia');

		return $conexion;


	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
		return null;
	}
	}

	$conexion=getPDO();

	if ($conexion) {
		# code...
		
		$statement=$conexion->prepare("SELECT * FROM students_table");
		$statement->execute();
		
		$userData=array();
		
		while($row=$statement->fetch(PDO::FETCH_ASSOC)){
			

			$userData[]=$row;

			

		}

	}else{
		echo "Error 404";
	}
	echo json_encode($userData);

	

?>