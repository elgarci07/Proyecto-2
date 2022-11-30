<?php

require "../config/conexion.php";
$id=$_POST['id_empleado'];
$query = $conexion->prepare("SELECT * FROM tbl_empleado WHERE id_empleado = $id");
// var_dump($id);

// $query->bindParam(1, $id);
$query->execute();
$resultado = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado);
