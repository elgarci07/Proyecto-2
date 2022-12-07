<?php

require_once "../config/conexion.php";
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$cargo = $_POST['cargo'];
$mail = $_POST['mail'];
$password = $_POST['password'];


$query = $conexion->prepare("INSERT INTO `tbl_empleado`(`id_empleado`, `nom_empleado`, `ape_empleado`, `dni_empleado`, `fk_cargo_empleado`, `password`, `email`) VALUES 
(NULL,?,?,?,?,?,?)");

$query->bindParam(1, $nombre);
$query->bindParam(2, $apellido);
$query->bindParam(3, $dni);
$query->bindParam(4, $cargo);
$query->bindParam(5, $password);
$query->bindParam(6, $mail);
$query->execute();

echo "OK";