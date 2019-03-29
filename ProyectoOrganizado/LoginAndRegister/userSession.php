<?php
class UserSession{
    public function __construct(){
        session_start();

    }
    
    public function setCurrentUser($user){
        //este es el nombre de mi sesion
        $_SESSION['user']=$user;
    }
    public function get_current_user(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>