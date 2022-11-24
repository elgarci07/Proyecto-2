<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Principal</title>
</head>

<body class="d-flex flex-column h-100">

  <header>
    <!--Navbar ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Login PDO</a>
      </div>
    </nav>
  </header>

  <!--Body ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
  <hr>
  <br>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <h3>Panel de control</h3>
          <hr>
        </div>

        <div class="col-md-6">
          <form method='post' action="">
            <input class="btn btn-danger" type="submit" value="Salir" name="but_logout">
          </form>
        </div>
      </div>
    
    </div>
</body>
</html>

<?php
  

include "../config/config.php";

// Chequea si el usuario esta iniciado ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (!isset($_SESSION['nombre'])) {
  echo $_SESSION['nombre'];
  // echo "testt";
  die();
   header('Location: login.php');
   
}else{
  echo "kktia";
}

// Cerrar sesion ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (isset($_POST['but_logout'])) {
  session_destroy();
  header('Location: login.php');
}
?>