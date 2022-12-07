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

        <!-- LINKS MENU -->
        <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../view/index.php">Reservas</a></div>
        <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../Crud-Ajax/empleados.php">Empleados</a></div>
        <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../mesas/mesas.php">Mesas</a></div>

            <div class="ms-auto p-2 bd-highlight text-white">
                <form method='post' action="../function/cerrarlogin.php">
                    <button class="btn btn-danger" type="submit" value="Salir" name="but_logout"><i
                            class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </div>
        </nav>
    </header>

    <!-- JS DE RESERVA :::::::::::::::::::::::::::::::::::::::::::::: -->



    <!--Body ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa-solid fa-calendar"></i> Reservas</h3>
                <br>


                
<!-- BUSCAR -->

  <form action="" method="post" id="frmbusqueda">
      <div class="input-group mb-3">
          <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
      </div>
  </form>
  

  

<!-- modal Editar :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->    

<!-- The Modal -->
 <div class="modal" id="myModalEdit">
  <div class="modal-dialog">
    <div class="modal-content"> 

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reservar una mesa:</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
    <div class="modal-body">
    <form id="editreserva">
    <input type="hidden" name="id_registro" id="id_registro">
    <label for="cliente">Cliente:</label>
          <input type="text" id="cliente" name="cliente">
          <br><label for="id_mesa">Mesa:</label><br>
          <input type="number" id="id_mesa" name="id_mesa">
          <br><br>
          
            <!-- <select name="id_mesa" id="id_mesa">
              <?php
                //  $query = $conexion -> prepare ("SELECT * FROM tbl_mesa");
                //  $query -> execute();
              
                //  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                //    foreach ($resultado as $valores) {
                      
                //   echo '<option value=" Mesa'.$valores["id_mesa"].'">'.$valores["num_mesa"].'</option>';
                //  }
              ?>
            </select> -->
            <br>
          
          <label for="comensales">Comensales:</label><br>
          <input type="number" id="comensales" name="comensales" min="1" max="20">
          <br>
      
      <br>
      <input type="date" id="fecha" name="fecha" value="2022-11-27" min="2022-11-27" max="2023-12-30">
      <br>
      <select id="hora" name="hora">
            <option value="13:00:00">13:00</option>
            <option value="14:00:00">14:00</option>
            <option value="15:00:00">15:00</option>
            <option value="20:00:00">20:00</option>
            <option value="21:00:00">21:00</option>
            <option value="22:00:00">22:00</option>
      </select>
      <br>
        <input type="submit" class="btn btn-success" data-bs-dismiss="modal">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </form> 
    </div>

    

    </div>
  </div>
</div> 

  <!-- BOTON AÑADIR RESERVA:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
  
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
     <form id="crearreserva">
      
     <label for="comensales">Cliente:</label>
          <input type="text" id="cliente" name="cliente" >
          <br>
          <label for="mesa">Mesa:</label><br>
            <!-- <select name="mesa" id="mesa">  -->
            <input type="number" id="mesa" name="mesa" min=1 max=20>
              <?php
                // $query = $conexion -> prepare ("SELECT * FROM tbl_mesa");
                // $query -> execute();
              
                // $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                //   foreach ($resultado as $valores) {
                      
                //   echo '<option value=" Mesa'.$valores["id_mesa"].'">'.$valores["id_mesa"].'</option>';
                // }
              ?>
             </select>
            <br>
        
          <label for="comensales">Comensales:</label><br>
          <input type="number" id="comensales" name="comensales" min="1">
          <br>
         
             
      <br>
      <br>
        <input type="date" id="fecha" name="fecha" value="2022-12-07" min="2022-12-06" max="2023-12-30">
      <br>
      <select id="hora" name="hora">
            <option value="13:00:00">13:00</option>
            <option value="14:00:00">14:00</option>
            <option value="15:00:00">15:00</option>
            <option value="20:00:00">20:00</option>
            <option value="21:00:00">21:00</option>
            <option value="22:00:00">22:00</option>
      </select>
      <br>
        <input type="submit" class="btn btn-success" data-bs-dismiss="modal">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </form>  
    </div> 

     

    </div>
  </div>
</div>


              <!-- TABLA -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Reserva</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Comensales</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Nº Mesa</th>
                            <th scope="col">Atendido por:</th>
                            
                        </tr>
                    </thead>
                    <tbody id="resultado"></tbody>
                </table>
            </div>
        </div>
    </div>

    
    <!-- <script src="../reserva/today.js"></script> -->
    <script src="../reserva/scriptreserva.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../static/js/vallog.js"></script>  -->
    
</body>

</html>
