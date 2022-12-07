<?php
require_once "../config/conexion.php";
$id = $_POST['id_empleado'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$cargo = $_POST['cargo'];
$password = $_POST['password'];
$email = $_POST['mail'];
//echo $data;


$query = $conexion->prepare("UPDATE tbl_empleado SET nom_empleado=?,ape_empleado=?,dni_empleado=?,fk_cargo_empleado=?,password=?,email=? WHERE id_empleado = ?");
// echo "<script>console.log('Console: " . $query . "' );</script>";
$query->bindParam(1, $nombre);
$query->bindParam(2, $apellido);
$query->bindParam(3, $dni);
$query->bindParam(4, $cargo);
$query->bindParam(5, $password);
$query->bindParam(6, $email);
$query->bindParam(7, $id);
$query->execute();

$result = $query->execute();

	// if ($result) {
		echo "OK";
		// header('Location: index.php');
	// }else{
	// 	echo "Error";
	// }





