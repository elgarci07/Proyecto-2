<?php
session_start();
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

        <!-- LINKS MENU -->
        <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../view/index.php">Reservas</a></div>
        <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../Crud-Ajax/empleados.php">Empleados</a></div>
          </div>

            <div class="ms-auto p-2 bd-highlight text-white">
                <form method='post' action="">
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
                <h3><i class="fa-solid fa-calendar"></i> Reservas</h3>
                <br>


                
<!-- TABLA -->

  <form action="" method="post" id="frmbusqueda">
      <div class="input-group mb-3">
          <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
      </div>
  </form>

  <!-- BOTON AÑADIR RESERVA -->
  
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Reservar</button>
  <br>
            
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reservar una mesa:</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="/action_page.php">
          <label for="mesa">Mesa:</label><br>
          <input type="number" id="mesa" name="mesa" value="John" min="1" max="20"><br>
          <label for="comensales">Comensales:</label><br>
          <input type="number" id="comensales" name="comensales" value="Doe" min="1"><br><br>
          <input type="submit" value="Submit">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </form> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


              <!-- TABLA -->

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Reserva</th>
                            <th scope="col">ID Camarero</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Personas</th>
                            <th scope="col">Dia Inicio</th>
                            <th scope="col">Dia Fin</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultado"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../static/js/script.js"></script>
</body>

</html>
<?php
  

include "../config/conexion.php";

// Chequea si el usuario esta iniciado, en caso de que no vuelve a login ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (!isset($_SESSION['nombre'])) {
  echo $_SESSION['nombre'];
  
  
   header('Location: login.php');
   
} // Ha entrado si no salta

// Cerrar sesion ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
if (isset($_POST['but_logout'])) {
  session_destroy();
  header('Location: login.php');
}
?>