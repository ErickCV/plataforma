
<!DOCTYPE html>
  <head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  </head>
  <body>
    <!--- nav bar-->
    <?php include "header.php";?>

    <!-- login form-->
    <form action="../validar.php" method="post">
    <div class="row mt-5">
        <div class="col-4"></div>
        <label for="idCorreo" class="col-1 mt-3 ">Correo</label><div class="col-7"></div>

        <div class="col-4"></div>
        <input name="correo" type="email" class="col-4 form-control" id="idCorreoinput" aria-describedby="emailHelp" placeholder="algo@algo...."><div class="col-4"></div>
    </div>

    <div class="row">
        <div class="col-4"></div>
        <label for="idpass" class="col-1 mt-3">Contraseña</label> <div class="col-7"></div>

        <div class="col-4"></div>
        <input name="clave" type="password" class="col-4 form-control" id="idpassinput" placeholder="*******"><div class="col-4"></div>
    </div>

    <div class="row">
        <div class="col-5"></div>
        <button type="submit" class="btn btn-primary col-1 ml-5 mt-3 ">Ingresar</button><div class="col-6"></div>
    </div>
  </form>

  <?php
  //
  // if(isset($_GET['m']) && $_GET['m']==1)
  // {
  //   echo '<h2> Forma 1: datos incorrectos</h2>';
  // }
  // session_start();
  //   if(isset($_SESSION['error']) && $_SESSION['error']>'')
  //   {
  //     echo "Forma 2".$_SESSION['error'];
  //   }

  ?>

  </body>
</html>
