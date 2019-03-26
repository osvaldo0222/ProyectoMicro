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

  <!-- Start your project here-->
  <!-- Default form login -->
<form class="text-center border border-light p-5 forms" action="" method="post" >
<img src="img/iconUser80.png" class="mb-4">

<p class="h4 mb-4">Login</p>

<!-- Email -->
<input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email" require="">

<!-- Password -->
<input type="password" id="password" class="form-control mb-4" placeholder="Contraseña" name="password" require="">


<?php

if (isset($errorLogin)) :?>
  <div class="alert alert-danger" role="alert">
<?php echo $errorLogin; ?>
</div>

<?php endif; ?>


<!-- Sign in button -->
<button class="btn btn-info btn-block my-4" type="submit">Entrar</button>


</form>
<!-- Default form login -->
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
</body>

</html>