<?php
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){

    $consulta = $conexion->prepare("SELECT * FROM tbl_empleado INNER JOIN tbl_cargo ON tbl_empleado.fk_cargo_empleado = tbl_cargo.id_cargo");
    $consulta->execute();

}else{
    $filtro=$_POST['filtro'];

//PREPARAMOS FILTRO CON LOS CAMPOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    $consulta = $conexion->prepare("SELECT * FROM tbl_empleado 
     WHERE id_empleado LIKE '%".$filtro."%'
     OR nom_empleado LIKE '%".$filtro."%' 
     OR ape_empleado LIKE '%".$filtro."%'
     OR dni_empleado LIKE '%".$filtro."%'
     OR fk_cargo_empleado LIKE '%".$filtro."%'
     OR email LIKE '%".$filtro."%'
     OR password LIKE '%".$filtro."%'
    ");
     $consulta->execute();
}

    //4. Transformar consulta SQL en Array assoc.
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data) {
        // echo"hola";
        echo "<tr>
                <td>" . $data['id_empleado'] . "</td>
                <td>" . $data['nom_empleado'] . "</td>
                <td>" . $data['ape_empleado'] . "</td>
                <td>" . $data['dni_empleado'] . "</td>
                <td>" . $data['nom_cargo'] . "</td>
                <td>" . $data['email'] . "</td>
                <td>" . $data['password'] . "</td>
                
                <td>
                    <button type='button' class='btn btn-success' onclick=editar('" . $data['id_empleado'] . "')>Editar</button>
                    <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id_empleado'] . "')>Eliminar</button>
                </td>        
            </tr>";
    };
    
