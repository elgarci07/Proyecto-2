<?php
require_once "../config/conexion.php";
$id = $_POST['id_registro'];
$cliente = $_POST['cliente'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$id_mesa = $_POST['id_mesa'];
//$id_camarero = $_POST['id_camarero'];
$comensales = $_POST['comensales'];
//echo $data;


$query = $conexion->prepare("UPDATE `tbl_registro` SET `cliente` = ?, `fecha` = ?, `hora` = ?, `id_mesa` = ?, `num_comensales` = ? WHERE `tbl_registro`.`id_registro` = ?;");
// echo "<script>console.log('Console: " . $query . "' );</script>";
$query->bindParam(1, $cliente);
$query->bindParam(2, $fecha);
$query->bindParam(3, $hora);
$query->bindParam(4, $id_mesa);
//$query->bindParam(5, $id_camarero);
$query->bindParam(5, $comensales);
$query->bindParam(6, $id);
$query->execute();

$result = $query->execute();

	// if ($result) {
		echo "OK";
		// header('Location: index.php');
	// }else{
	// 	echo "Error";
	// }





