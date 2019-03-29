<?php
class DB{
    private $dsn;
    private $dbname;
    private $user;
    private $password;

    public function __construct(){
    $this->dsn='pgsql:host=localhost;port=5432;dbname=Micro';
    
    $this->dbname='Micro';
    $this->user='postgres';
    $this->password='101@Dunia';
    }

    function connect(){

        try{
            
            //$conexion=new PDO($this->dsn,$this->user,$this->password);
           
            $conexion=new PDO('pgsql:host=localhost;port=5432;dbname=Micro;user=postgres;password=101@Dunia');
           
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
            echo"Bien";
      
          }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
          }

    }  
}



?>