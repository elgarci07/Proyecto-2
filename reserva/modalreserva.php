<?php

require "../config/conexion.php";
$id=$_POST['id_registro'];
$query = $conexion->prepare("SELECT * FROM tbl_registro WHERE id_registro = $id");
// var_dump($id);

// $query->bindParam(1, $id);
$query->execute();
$resultado = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado);
