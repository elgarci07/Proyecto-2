<?php
require_once "../config/conexion.php";
$data = $_POST['id_empleado'];

echo $data;


$query = $conexion->prepare("DELETE FROM tbl_empleado WHERE id_empleado = ?");
$query->bindParam(1, $data);

// $query->execute();

$result = $query->execute();

	// if ($result) {
		echo "OK";
		header('Location: index.php');
	// }else{
	// 	echo "Error";
	// }


