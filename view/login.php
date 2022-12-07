<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Login PDO</title>
</head>

<body class="d-flex flex-column h-100">
    <br>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3>ACCEDE A LA INTRANET</h3>
                <hr>
            </div>
            <div class="col-md-6">

                <div id="div_login">

                    <div>
                        <form onsubmit="return validarEmail()" method="post" action="../function/controllerlogin.php">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input  type="text" class="form-control" name="nombre" aria-describedby="emailHelp" id="email">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="pwd" >
                            </div>

                            <button  type="submit" class="btn btn-primary" name="boton" id="password">Iniciar sesión</button>
                            <!-- <button onclick="return validaFormulario()" type="submit" class="btn btn-primary" name="boton" id="password">Iniciar sesión</button> -->
                        <p id="emailp"></p>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>












    <script src="../static/js/vallog.js"></script> 



    

</body>

</html>