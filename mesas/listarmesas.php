<?php
    //1. Conexion a la bd
    //2. Consulta SQL
    //3. Ejecutar consulta SQL
    //4. Transformar consulta SQL en Array assoc.
    //5. Montar tabla 
require_once "../config/conexion.php";
if(empty($_POST['filtro'])){

    $consulta = $conexion->prepare("SELECT * FROM tbl_mesa");
    $consulta->execute();

}else{
    $filtro=$_POST['filtro'];

//PREPARAMOS FILTRO CON LOS CAMPOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    $consulta = $conexion->prepare("SELECT * FROM tbl_mesa 
     WHERE id_mesa LIKE '%".$filtro."%'
     OR num_mesa LIKE '%".$filtro."%' 
     
     OR fk_num_sala LIKE '%".$filtro."%'
     OR estado_mesa LIKE '%".$filtro."%'
    ");
     $consulta->execute();
}

    //4. Transformar consulta SQL en Array assoc.
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data) {
        // echo"hola";
        echo "<tr>
                <td>" . $data['id_mesa'] . "</td>
                <td>" . $data['num_mesa'] . "</td>
                
                <td>" . $data['fk_num_sala'] . "</td>
                <td>" . $data['estado_mesa'] . "</td>
                   
            </tr>";
    };
    
