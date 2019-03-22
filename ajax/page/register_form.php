<?php

		if ($_SERVER['REQUEST_METHOD']=='POST'){
			$StudentsName=$_POST['StudentsName'];
			$cedula=$_POST['cedula'];
			$StudentsId=$_POST['StudentsId'];
			$StudentsCarrer=$_POST['StudentsCarrer'];
			$telefono=$_POST['Telefono'];
			$email=$_POST['email'];
			$error='';

			//echo "$StudentsCarrer-->Hola";

			if(empty($StudentsName) || empty($cedula) || empty($StudentsId) || empty($StudentsCarrer) ){
		$error.='<li>Rellena los datos correctamente</li>';
			}else{

		include 'views/postgresConectionCarrers.php';



		$statement=$conexion->prepare('SELECT * FROM dbo."Estudiantes" WHERE matricula=:StudentsId limit 1');
		$statement->execute(array(':StudentsId'=> $StudentsId));
		$resultado=$statement->fetch();

		if ($resultado != false) {
			$error.='<li>Esta Matriculado  ya esta registrada</li>';
			echo "User Registred";
			//$error.='<li>Esta empresa ya esta registrada</li>';
			
		}

		

		



	}



		if ($error == '') {
		/*	
		$sql="INSERT INTO Estudiantes (matricula, nombre, cedula, correo, telefono, id_carrera) VALUES ('".$StudentsId."', '".$StudentsName."', '".$cedula."', '".$email."', '".$telefono."', '".$StudentsCarrer."')";  
		$result=$conexion->prepare($sql);
		$statement->execute($result);*/

		$sql='INSERT INTO dbo."Estudiantes" (matricula, nombre, cedula, correo, telefono, id_carrera) VALUES (:StudentsId,:StudentsName,:cedula,:email,:telefono,:StudentsCarrer)';  
		$statement=$conexion->prepare($sql);
		$statement->bindParam(':StudentsId',$StudentsId);
		$statement->bindParam(':StudentsName',$StudentsName);
		$statement->bindParam(':cedula',$cedula);
		$statement->bindParam(':email',$email);
		$statement->bindParam(':telefono',$telefono);
		$statement->bindParam(':StudentsCarrer',$StudentsCarrer);
		$statement->execute();


		print_r($statement);
		if ($statement) {
			//echo "Good data";
			# code...
		}else{
			//echo "no good";
		}
		header('Location:register_form.php');
	}








		}
		require'views/register_form.view.php';
?>