<?php

try{

      $conexion=new PDO('pgsql:host=localhost;port=5432;dbname=Micro;user=postgres;password=101@Dunia');
     // echo("1");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "CORRECTO";

    }catch(PDOException $e){
      echo "Error:" . $e->getMessage();
    }
      # code...
    

?>