<?php

	//error_reporting(0);
	//header('Content-type:application/json;charset=utf8');
	echo"Good";
	//include_once 'ConectionToDB.php';
	$db=new DB();
	
	if ($db->connect()) {
		echo"Good";
		session_start();
		$idGroup=$_SESSION['id_grupo'];
		if (isset($idGroup)) {
			echo $idGroup;
			# code...
		}else{
			echo"Error";
		}


		$statement=$db->connect()->prepare('SELECT * FROM dbo."GruposEst" WHERE id_grupo=:id_grupo');
		$statement->bindParam('id_grupo',$idGroup);
		$statement->execute();

		$userData=array();

		while($row=$statement->fetch(PDO::FETCH_ASSOC)){
			

			$userData[]=$row;

		}
	//	echo json_encode($userData);



	
	}

/*
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
	echo json_encode($userData);*/

	

?>