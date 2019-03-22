<?php

	error_reporting(0);
 	header('Content-type:application/json;charset=utf8');
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$id=$_POST['Matricula'];
		$name=$_POST['Nombre'];
		$facultad=$_POST['Facultad'];
		$status=$_POST['Status'];
		# code...
	}


 	


	function valData($id,$name,$facultad,$status){
		if ($name=='') {
			return false;

			# code...
		}elseif ($id =='') {
			return false;
			# code...
		}elseif ($facultad=='') {
			# code...
			return false;
		}elseif ($status=='') {
			return false;
			# code...
		}
		echo "GOOF";
		return true;
	}

	if (valData($id,$name,$facultad,$status)) {

			function getPDO(){
				try {
						$conexion = new PDO('mysql:host=localhost;dbname=pruebamicro', 'root', '101@Dunia');
						echo "PEPE";
						return $conexion;


					} catch (PDOException $e) {
						echo "Error:" . $e->getMessage();
						return null;
					}
							}

		$conexion=getPDO();

		if ($conexion) {
			$statement=$conexion->prepare("INSERT INTO students_table(_id,_Nombre,_Facultad,Status) VALUES (?,?,?,?)");
			$statement->bind_param("ssss",$id,$name,$facultad,$status);
			$statement->execute();
			$answer=[];

			if ($conexion->affected_rows<=0) {
				echo "ERROR,No hay filas agregadas";
				# code...
			}else{
				echo "Registtro";
			}

			# code...
		}else{
			echo "error, no hay conexion a bdd";
		}

		
	}
	//echo json_encode($statement);


?>