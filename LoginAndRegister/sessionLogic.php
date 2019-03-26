<?php
include_once 'ConectionDB/user.php';
include_once 'userSession.php';

$userSession=new UserSession();
//$user=new User();

if (isset($_SESSION['user'])) {
 // include_once 'pasoNameParameters.php';
  // $user->setUser($userSession->get_current_user());
    echo $user->getName();
    include_once 'dash/dashboard.php';
   
    # code...
}
/*else if (isset($_POST['email']) && isset($_POST['password'])) {
  //  echo"Login Val";
    $userForm=$_POST['email'];
    $userPassword=$_POST['password'];
    
    if ($user->userExist($userForm,$userPassword)) {
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'dash/dashboard.php';
       //header("Location: dash/dashboard.php" );
      //  echo"Usuarioexiste";
    }else{
        $errorLogin="Nombre de usuario o contraseña incorrectos.";
        include_once 'log.php';
        //echo"Error";
    }*/
    # code...
/*}else {
   // echo "mmg";
    include_once 'log.php';
}*/

?>