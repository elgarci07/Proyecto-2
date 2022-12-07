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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2cb25f2c39.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../static/css/styles.css">
    <title>BAR ALMANSA</title>



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
        <input type="date" id="fecha" name="fecha" value="2022-12-07" min="2022-12-07" max="2023-12-30">
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

<!-- BAR ALMANSA -->



<div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="img/bar1.jpg" style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="img/bar2.jpg" style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="img/bar3.jpg" style="width:100%">

        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <div class="one-column" id="Bar">
        <p>Almansa es un espacio que fundamos con la idea de disfrutar de los pequeños placeres que nos hacen felices: la cerveza, los amigos, los buenos snacks y la buena música.
        </p>
    </div>


    <div class="one-column">
        <p> El concepto que nos hace únicos. La calidad y la originalidad son marca de la casa. Una de las claves del éxito de la carta es el pan de receta patentada y que además se hornea en el momento en el que el cliente hace el pedido.
        </p>
    </div>

    

    <div class="textoMiraCarta" id="Carta">
        <h1>¡Échale un vistazo a la carta!</h1>
        <br>
        <button class="button-50" role="button"><a class="descargaMenu" href="Documents/Menu_Restaurante_Almansa.pdf" download="Menú Restaurante Almansa">CARTA</a></button>
    </div>

    <div class="row" id="section-3">
        <div class="three-column">
            <img src="img/tortilla.jpeg" alt="Tortilla">
        </div>
        <div class="three-column">
            <img src="img/plato2.jpg" alt="Cocretas">
        </div>
        <div class="three-column">
            <img src="img/plato6.jpg" alt="Bravas">
        </div>
    </div>
    <div class="row" id="section-3">
        <div class="three-column" id="platinum-label">
            <img src="img/plato3.jpg" alt="Albondigas">
        </div>
        <div class="three-column">
            <img src="img/plato4.jpg" alt="Pulpo">
        </div>
        <div class="three-column">
            <img src="img/plato5.jpg" alt="Pantomacà">
        </div>

    </div>

    <div class="one-column" id="Mapa">
        <h2> ¡Encuentrános y ven a visitarnos!
        </h2>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2982.7588280526556!2d2.2983792000000003!3d41.617726600000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4c7d4b0974f17%3A0xe51745f0c1df7360!2sCarrer%20del%20Bosc%2C%2008521%20Bellavista%2C%20Barcelona!5e0!3m2!1ses!2ses!4v1664300361079!5m2!1ses!2ses"
        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



    <a href="https://wa.me/34636925502/?text=Hola%20buenas,%20quiero%20reservar%20eldia..." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

</body>

<script src="../static/js/menu.js"></script>
<script src="../static/js/slider.js"></script>

</html>















<script src="../reserva/reservacliente.js"></script> 
    
</body>



</html>