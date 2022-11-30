<?php
include "../config/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <!-- <div class="p-2 bd-highlight text-white" style="font-size:20px"><a style="text-decoration: none; color: white;" href="../Crud-Ajax/empleados.php">ACCESO PRIVADO</a></div> -->
          </div>

            <div class="ms-auto p-2 bd-highlight text-white">
                <form method='post' action="../view/login.php">
                    <button class="btn btn-success" type="submit" value="Salir"><i
                            class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Reserva</button>
  <br>
        </nav>
    </header>



  <!-- BOTON AÑADIR RESERVA -->
  
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Reservar</button>
  <br> -->
            
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
        
      <!-- method="POST" action="../reserva/crearreserva.php" -->
      <label for="mesa">Fecha de la reserva</label><br>
        <input type="date" id="fecha" name="fecha" value="2022-11-27" min="2022-11-27" max="2023-12-30">
        <br>
        <label for="comensales">Cuantos vais a ser?:</label><br>
          <input type="number" id="comensales" name="comensales" min="1">
        <br>
          <label for="mesa">Mesa:</label><br>
          <!-- <input type="number" id="mesa" name="mesa" min="1" max="20"><br> -->
          <select name="mesa" id="mesa">
          <?php
          $query = $conexion -> prepare ("SELECT * FROM tbl_mesa");
          $query -> execute();
        
          $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $valores) {
                
            echo '<option value=" Mesa'.$valores["id_mesa"].'">'.$valores["num_mesa"].'</option>';
          }
        ?>
</select>
<br>
<label for="mesa">Quien deseas que sea tu camarero:</label><br>
<select name="fk_id_empleado" id="fk_id_empleado">
              <?php
                $query = $conexion -> prepare ("SELECT * FROM tbl_empleado where fk_cargo_empleado=1");
                $query -> execute();
              
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($resultado as $valores) {
                      
                  echo '<option value=" Mesa'.$valores["id_empleado"].'">'.$valores["nom_empleado"].'</option>';
                }
              ?>
            </select>




<br>






          <label for="mesa">Introduce tu nombre y apellido</label><br>
          <input type="text" id="cliente" name="cliente" placeholder="Cliente" min="1" max="20"><br>
          
      
        
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






<script src="../reserva/scriptreserva.js"></script> 
    
</body>



</html>