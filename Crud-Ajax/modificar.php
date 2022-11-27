<?php
require_once "../config/conexion.php";
$id = $_POST['id_empleado'];
$nombre = $_POST['nom_empleado'];
$apellido = $_POST['ape_empleado'];
$dni = $_POST['dni'];
$cargo = $_POST['cargo'];
$password = $_POST['password'];
$email = $_POST['email'];
//echo $data;


$query = $conexion->prepare("UPDATE `tbl_empleado` SET `id_empleado`= $id,`nom_empleado`= $nombre ,`ape_empleado`='$apellido',`dni_empleado`='$dni',`fk_cargo_empleado`='$cargo',`password`= $password,`email`= $email WHERE id_empleado = $id");
$query->bindParam(1, $data);

// $query->execute();

$result = $query->execute();

	// if ($result) {
		echo "OK";
		// header('Location: index.php');
	// }else{
	// 	echo "Error";
	// }





