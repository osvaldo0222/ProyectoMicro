<?php
include_once 'ConectionToDB.php';
class User extends DB{

    private $name;
    private $username;

    public function userExist($user,$password){
        $query=$this->connect()->prepare('SELECT * FROM dbo."Profesores" WHERE usuario = :usuario AND password = :password');
        $query->execute(array(':usuario' => $user,':password' => $password));
        $result=$query->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            return $result;
        }else{
            return false;
        }


    }
    public function setUser($user){
        $query=$this->connect()->prepare('SELECT * FROM dbo."Profesores" WHERE usuario = :usuario');
        $query->execute([':usuario' => $user]);

        foreach ($query as $currentUser) {
            $this->username=$currentUser['usuario'];
            $this->name=$currentUser['nombre'];


        }

    }

    public function getName(){
        return $this->name;
    }

}



?>