<?php

require_once "../config/conexion.php";

// Recoge la id del camarero
$camarero = $POST['id_empleado'];
$mesa = $_POST['mesa'];
$cliente = $_POST['cliente'];
$comensales = $_POST['comensales'];
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];



$query = $conexion->prepare("INSERT INTO `tbl_registro`(`id_registro`, `cliente`, `fecha`, `hora`, `id_mesa`, `id_camarero`, `num_comensales`) VALUES 
(NULL,?,?,?,?,?,?)");

$query->bindParam(1, $cliente);
$query->bindParam(2, $fecha);
$query->bindParam(3, $hora);
$query->bindParam(4, $mesa);
$query->bindParam(5, $camarero);
$query->bindParam(6, $comensales);

$query->execute();
// echo $query;



echo "OK";