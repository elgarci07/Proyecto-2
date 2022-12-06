<?php
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){



    $consulta = $conexion->prepare("SELECT * FROM tbl_registro");
    $consulta->execute();

}else{
    $filtro=$_POST['filtro'];


//PREPARAMOS FILTRO CON LOS CAMPOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    $consulta = $conexion->prepare("SELECT * FROM tbl_registro
     WHERE id_registro LIKE '%".$filtro."%'
     OR cliente LIKE '%".$filtro."%'
     OR num_comensales LIKE '%".$filtro."%' 
     OR fecha LIKE '%".$filtro."%'
     OR hora LIKE '%".$filtro."%'
     OR id_mesa LIKE '%".$filtro."%'
     OR id_camarero LIKE '%".$filtro."%'  
    ");
     $consulta->execute();
}

    //4. Transformar consulta SQL en Array assoc.
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data) {
        // echo"hola";
        echo "<tr>
                <td>" . $data['id_registro'] . "</td>
                <td>" . $data['cliente'] . "</td>
                <td>" . $data['num_comensales'] . "</td>
                <td>" . $data['fecha'] . "</td>
                <td>" . $data['hora'] . "</td>
                <td>" . $data['id_mesa'] . "</td>
                <td>" . $data['id_camarero'] . "</td>
                
                
                <td>
                   
                    <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id_registro'] . "')>Eliminar</button>
                </td>        
            </tr>";
    };
    

    // <button type='button' class='btn btn-success' onclick=editar('" . $data['id_registro'] . "')>Editar</button>
