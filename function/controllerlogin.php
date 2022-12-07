<?php
include "../config/conexion.php";

// Llamar a pagina
$entrada_valida = true;
require_once '../view/login.php';


// On submit ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (isset($_POST['boton'])) 
{

        $username = $_POST['nombre'];
        $password = $_POST['pwd'];



        // echo $username;
        // echo $password;

        //   die();

            $sentencia = $conexion->prepare("SELECT * FROM tbl_empleado WHERE email=? and password=?");
            $sentencia->execute([$username, $password]);
            
            $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
                       
        //var_dump($datos);
        // echo $datos;
            session_start();

            if (empty($datos)) {
                header('Location: ../view/login.php');
                // echo "no chuuta";
                

            }
            
            else{
                // echo "no va";
                $_SESSION['nombre'] = $datos['email'];
                // echo $_SESSION['nombre'];
                // $_SESSION['id_empleado'] = $username;
                $_SESSION['id_empleado'] = $datos['id_empleado'];
                // print_r($_SESSION['id_empleado']);
                // die();
                // print_r($username);
                // echo "hola";
                
                header('Location: ../view/index.php');
            }
}




?>
