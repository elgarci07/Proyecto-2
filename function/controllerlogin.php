<?php
include "../config/config.php";

// On submit ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (isset($_POST['boton'])) {

  $username = $_POST['nombre'];
  $password = $_POST['pwd'];



  echo $username;
  echo $password;

//   die();

    $sentencia = $conn->prepare("SELECT * FROM tbl_empleado WHERE email=? and password=?;");
    $sentencia->execute([$username, $password]);
    $datos = $sentencia->fetch(PDO::FETCH_ASSOC);

var_dump($datos);
// echo $datos;
    session_start();

    if ($datos === FALSE) {
        // header('Location: login.php');
        echo "no chuuta";
        

    }elseif($sentencia->rowCount() == 1){
        $_SESSION['nombre'] = $datos['email'];
        echo $_SESSION['nombre'];
        die();
        header('Location: ../view/index.php');
        echo "chuta";

    }else{
        echo "pene";
    }

}

?>
