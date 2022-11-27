<?php
require_once "../config/conexion.php";
$codigo = $_POST['mesa'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

// print_r($codigo);
// print_r($producto);
// print_r($precio);
// print_r($cantidad);

// die();

$query = $conexion->prepare("INSERT INTO `tbl_registro`( `codigo`, `producto`, `precio`, `cantidad`) VALUES (?,?,?,?)");
$query->bindParam(1, $codigo);
$query->bindParam(2, $producto);
$query->bindParam(3, $precio);
$query->bindParam(4, $cantidad);
$query->execute();


echo "OK";