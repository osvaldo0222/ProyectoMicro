<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="formStyles">

  
   
        <form class="text-center border border-light p-5 forms"  action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <img src="img/iconUser80.png" class="mb-4">
    <p class="h4 mb-4">Registro de Estudiante</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="StudentsName" class="form-control" placeholder="Nombre Estudiante" name="StudentsName" required="" onkeypress="allowLettersOnly(event)">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="cedula" class="form-control" placeholder="Cedula" name="cedula" required="" onkeypress="allowNumbersOnly(event)">
        </div>
    </div>

    <!-- E-mail -->
    
    
    <input type="text" id="StudentsId" class="form-control mb-4" placeholder="Matricula" name="StudentsId" required="" onkeypress="allowNumbersOnly(event)">
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
          
            <?php echo $error; ?>
        
        </div>
      <?php endif; ?>

    <!-- Password -->
    <div class="form-row mb-4">
    <div class="col-3"><span class="input-group-text">Carrera</span></div>
   <div class="col-9"><select name="StudentsCarrer" id="StudentsCarrer" class="form-control mb-4"></div>
    <option value="">Selecciona Carrera</option>
    <?php
     include_once '../ConectionDB/user.php';
     $newConect=new DB();


      if ($newConect->connect()) {
       
          $statement=$newConect->connect()->prepare('SELECT * FROM dbo."Carreras"');
          $statement->execute();
          //$resultado=$statement->fetch();

          while ($row=$statement->fetch(PDO::FETCH_ASSOC)) {



            ?>
    

    <option value="<?php echo $row['id_carrera']; ?>"><?php echo $row['carrera']; ?></option>

<?php
           
            
          }
         
    }
    ?>


    

   
     
   </select></div>

    <input type="email" id="Studentsemail" class="form-control mb-4" placeholder="email" name="email" required="" onkeypress="allowEmailsOnly(event)">

     <input type="text" id="cellphone" class="form-control" placeholder="Telefono" name="Telefono" required="" onkeypress="allowNumbersOnly(event)">

    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
       
    </small>

    <!-- Phone number -->
   

    <!-- Newsletter -->
    
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Registrar</button>

    <!-- Social register -->
   

    <hr>

    <!-- Terms of service -->
    <p>Al hacer click en
        <em>Registrar</em> acepta nuestros
        <a href="" target="_blank">terminos de servicios</a></p>

        <!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
      

</form>

<?php
if (isset($_POST['StudentsId']) && isset($_POST['StudentsName']) && isset($_POST['StudentsLastName']) && isset($_POST['StudentsCarrer'])) {
  //require_once"php/connect.php";
  //require_once"php/save.php";

 
}else{
 // echo "ERRRRRRRRRRRRRRRRRRRRO";
}
?>


  



  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="js/onlyNumbers.js"></script>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
</body>

</html>