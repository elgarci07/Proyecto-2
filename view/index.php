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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <title>Principal</title>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!--Navbar ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
        <nav class="d-flex bd-highlight mb-5 navbar bg-dark" style="padding: 0.5% 7.5%;">
            <div class="p-2 bd-highlight text-white" style="font-size:20px">Restaurant Dooku
          </div>
          <div class="p-2 bd-highlight text-white" style="font-size:20px"><a href="../Crud-Ajax/empleados.php">Empleados</a></div>
            
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
                <form action="" method="post" id="frmbusqueda">
                    <div class="input-group mb-3">
                        <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                    </div>
                </form>
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