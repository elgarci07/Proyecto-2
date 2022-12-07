<?php

require_once "../config/conexion.php";

// Recoge la id del camarero
// $camarero = $POST['id_empleado'];
$mesa = $_POST['mesa'];
$cliente = $_POST['cliente'];
$comensales = $_POST['comensales'];
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];



if (!empty($mesa && $cliente && $comensales && $fecha && $hora)) {

    //----------------------------------------------------------------
    $fecha_actual = date("Y-m-d");
    $hora_actual = date("H:i", time());
    
    //----------------------------------------------------------------
}

if ($fecha < $fecha_actual) {

}else if ($fecha > $fecha_actual) {



$query = $conexion->prepare("INSERT INTO `tbl_registro`( `cliente`, `fecha`, `hora`, `id_mesa`, `num_comensales`) VALUES 
(?,?,?,?,?)");

$query->bindParam(1, $cliente);
$query->bindParam(2, $fecha);
$query->bindParam(3, $hora);
$query->bindParam(4, $mesa);
$query->bindParam(5, $comensales);

$query->execute();
// echo $query;



echo "OK";
}