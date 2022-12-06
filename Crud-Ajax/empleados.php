<?php
session_start();


  // echo $_SESSION['id_empleado'];
  

include "../config/conexion.php";

// Chequea si el usuario esta iniciado, en caso de que no vuelve a login ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (empty($_SESSION['nombre'])) {
  // echo $_SESSION['nombre'];
  // echo "<script>location.href='../view/index.php'</script>";
  //  header('Location: ../view/index.php');

  header('Location: ../view/login.php');
}// Ha entrado si no salta


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <title>Principal</title>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!--Navbar ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
        <nav class="d-flex bd-highlight mb-5 navbar bg-dark" style="padding: 0.5% 7.5%;">
        <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../view/index.php">Reservas</a></div>
          <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../Crud-Ajax/empleados.php">Empleados</a></div>
            
          <div class="ms-auto p-2 bd-highlight text-white">
                <form method='post' action="../function/cerrarlogin.php">
                    <button class="btn btn-danger" type="submit" value="Salir" name="but_logout"><i
                            class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </div>  
        </nav>
    </header>
    <!--Body ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa-solid fa-user"></i> Empleados</h3>
                <br>



                
                <form action="" method="post" id="frmbusqueda">
                    <div class="input-group mb-3">
                    <label for="buscar"></label>
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                    </div>
                </form>


<!-- modal Editar :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


            
<!-- The Modal -->
<div class="modal" id="myModalEdit">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Crear un empleado:</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
    <div class="modal-body">
      <form id="editempleado">
      <!-- method="POST" action="../reserva/crearempleado.php" -->
      <input type="hidden" name="id_empleado" id="id_empleado">
          <label for="mesa">Nombre:</label><br>
          <input type="text" id="nombre" name="nombre"><br>
          <label for="mesa">Apellido:</label><br>
          <input type="text" id="apellido" name="apellido"><br>
          <label for="dni">Dni:</label><br>
          <input type="text" id="dni" name="dni">
          <br>
          <p>Cargo:</p>
        <select name="cargo" id="cargo">
            <option value="1">Camarero</option>
            <option value="2">Mantenimiento</option>
            <option value="3">Admin</option>
        </select>
        <br>
        <label for="mail">Mail:</label><br>
          <input type="text" id="mail" name="mail">
          <br>
          <label for="password">Contraseña</label><br>
          <input type="text" id="password" name="password">
          <br>
          <br>
        <input type="submit" class="btn btn-success" data-bs-dismiss="modal">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </form> 
    </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>




































<!-- modal Crear :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Crear empleado</button>
  <br>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Crear un empleado:</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
    <div class="modal-body">
      <form id="crearempleado">
      <!-- method="POST" action="../reserva/crearempleado.php" -->
      <input type="hidden" name="id" id="id_empleado">
          <label for="mesa">Nombre:</label><br>
          <input type="text" id="nombre" name="nombre"><br>
          <label for="mesa">Apellido:</label><br>
          <input type="text" id="apellido" name="apellido"><br>
          <label for="dni">Dni:</label><br>
          <input type="text" id="dni" name="dni">
          <input type="hidden" id="origen" name="origen">
          <br>
          <p>Cargo:</p>
        <select name="cargo" id="cargo">
            <option value="1">Camarero</option>
            <option value="2">Mantenimiento</option>
            <option value="3">Admin</option>
        </select>
        <br>
        <label for="mail">Mail:</label><br>
          <input type="text" id="mail" name="mail">
          <br>
          <label for="password">Contraseña</label><br>
          <input type="text" id="password" name="password">
          <br>
          <br>
        <input type="submit" class="btn btn-success" data-bs-dismiss="modal">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </form> 
    </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<!-- fin modal :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->




                <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Cargo</th>
                            <th>Mail</th>
                            <th>Contraseña</th>
                        </tr>
                    </thead>
                    <tbody id="resultado"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>