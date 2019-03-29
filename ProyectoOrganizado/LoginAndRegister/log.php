<?php
include_once 'ConectionDB/user.php';
$user=new User();

if (isset($_SESSION['user'])) {
    $user->setUser($userForm);
   // require_once 'dash/dashboard.php';
   header("Location: simple-dash/simple-dashboard.php" );

    # code...
}else if (isset($_POST['email']) && isset($_POST['password'])) {
    //  echo"Login Val";
      $userForm=$_POST['email'];
      $userPassword=$_POST['password'];
      
      if ($user->userExist($userForm,$userPassword)!=false) {
        session_start();
        $file=$user->userExist($userForm,$userPassword);

         $_SESSION['user']=$file['nombre'];
         $_SESSION['id_']=$file['id_prof'];


         print_r ($_SESSION['id_']);
         print_r($_SESSION['user']);

         

         // $user->setUser($userForm);
  
         //require_once 'dash/dashboard.php';
         header("Location: simple-dash/simple-dashboard.php" );
          echo"Usuarioexiste";
      }else{
          $errorLogin="Nombre de usuario o contraseña incorrectos.";
         // include_once 'log.php';
          //echo"Error";
      }}

require 'L_R_views/login.view.php';

?>