<?php

	error_reporting(0);
	header('Content-type:application/json;charset=utf8');

	include_once 'ConectionToDB.php';
	$db=new DB();
	if ($db->connect()) {
		//echo"Conec Bien";
		session_start();
		$idGroup=$_SESSION['id_grupo'];
		

		
	


		$statement=$db->connect()->prepare('SELECT dbo."Estudiantes".* FROM dbo."Estudiantes", dbo."GruposEst" WHERE id_grupo=:id_grupo and dbo."GruposEst".matricula = dbo."Estudiantes".matricula');
		$statement->bindParam(':id_grupo', $idGroup);
		$statement->execute();

		$userData = array();

		while($row=$statement->fetch(PDO::FETCH_ASSOC)){
			$userData[] = $row;
		}
			
	}
	try{

	echo json_encode($userData);
       }   catch(Exception $e){
		
		$e->getMessage();

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