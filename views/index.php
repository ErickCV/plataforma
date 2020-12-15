
<?php

session_start();
session_destroy();
?>
<!DOCTYPE html>
  <head>
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
  </head>
  <body>

  <?php include "header.php";?>



    <div>
      <h2>Encuentra tu encuesta</h2>
    </div>
    <div class="row"><div class="col-4"></div>
      <input type="text" class="col-3 form-control mt-2 mr-5 ml-0" id="clave" placeholder="clave encuesta"><div class="col-5"></div>
    </div>
    <div class="row">
      <div class="col-4"></div>
      <button type="submit" id="clave" class="btn btn-custom col-1 mt-3 p-1">Aceptar</button>
      <button type="submit" id="mostrar" class="btn btn-custom2 col-2 ml-3 mt-3 pl-0 pr-0 ">Mostrar encuestas</button>
      <div class="col-5"></div>
  </div>

  <hr class="hr">


  </body>
</html>
