<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>C.A.A</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  
  <link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
  

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading bg-dark text-white">C.A.A </div>
      <div class="list-group list-group-flush">
          <div class="card" style="">
              <div class="card-body">

                <img src="img/snowman.png"><p class="userIco"><?php session_start(); echo $_SESSION['user'];  ?></p>
                <small class="smallLetter">Profesor</small>
                
              </div>
            </div>
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>

        <button class="accordion">Grupos</button>
<div class="panel">
<?php
     include_once '../ConectionDB/ConectionToDB.php';
     $id=$_SESSION['id_'];
    // echo $id;
     $newConect=new DB();
     


      if ($newConect->connect()) {

        
        /*
        $query=$this->connect()->prepare('SELECT * FROM dbo."Grupos" WHERE id_prof = :id_prof');
        $query->execute(array(':id_prof' => $_SESSION['id_']));
        $result=$query->fetch(PDO::FETCH_ASSOC);  
            quede aquiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii


         */
       
          $statement=$newConect->connect()->prepare('SELECT * FROM dbo."Grupos" WHERE id_prof =:id');
          $statement->bindParam(':id',$id);
          $statement->execute();
          //$resultado=$statement->fetch();
          $array=array();

          while ($row=$statement->fetch(PDO::FETCH_ASSOC)) {

           $array[]=$row;




            ?>
              
    

    <option value="<?php echo $row['id_grupo']; ?>"><a href="#" class="list-group-item list-group-item-action bg-dark btn active" id="btn_cargar_usuarios"><?php echo $row['clave']; ?></a></option>

<?php
           
            
          }
          $_SESSION['id_grupo']=$array;
         
    }
    ?>
</div>
       
        <a href="#" class="list-group-item list-group-item-action bg-light"></a>
      
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light border-bottom bg-dark text-white">
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profesor <?php echo $_SESSION['user']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ir al correo universitario</a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="col-md-4 panel_form" id="">
            
          </div>
          <div class="col-md-8">
            
              <header>
      <h1>Tabla de Usuarios</h1>
      <div>
        <button id="btn_cargar_usuarios" class="btn active">Cargar Usuarios</button>
      </div>
    </header>
    
      
      <div class="error_box" id="error_box">
        <p>Se ha producido un error.</p>
      </div>
      <table id="table" class="tabla table table-striped table-bordered">
        <tr>
          <th class="th-sm">Matricula:</th>
          <th class="th-sm">Nombre Estudiante</th>
          <th class="th-sm">Facultad</th>
          <th class="th-sm">Status</th>
          
        </tr>
      </table>
      <div class="loader" id="loader"></div>
    





          </div>
          
        </div>      

    </div>
    <!-- /#page-content-wrapper -->


  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jsPer.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
