<!DOCTYPE html>
  <head>
    <title>password</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  </head>

  <body>

    <?php
    include "header.php"
    ?>

    <div class="row mt-5">
        <div class="col-4"></div>
        <label for="idCorreo" class="col-1 mt-3 ">Correo</label><div class="col-7"></div>

        <div class="col-4"></div>
        <input type="email" class="col-4 form-control" id="idCorreo" aria-describedby="emailHelp" placeholder="algo@algo...."><div class="col-4"></div>
    </div>

    <div class="row">
        <div class="col-5"></div>
        <button type="submit" class="btn btn-primary col-1 ml-5 mt-3 pr-1 pl-1">Enviar correo</button><div class="col-6"></div>
    </div>

  </body>
</html>
