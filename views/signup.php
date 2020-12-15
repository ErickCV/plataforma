<!DOCTYPE html>
  <head>
    <title>signup</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  </head>

  <body>
  <?php include "header.php";?>

 <!-- signup form-->
<form method="post" action="../registrarUsuario.php">
  <div class="row mt-5">
      <div class="col-4"></div>
      <label  for="idName" class="col-1 mt-3 mr-n4" >Nombre</label> 
      <input name="nombre" type="text" class="col-1 form-control mt-2 mr-5" id="idName" aria-describedby="nombreText">

      <label for="idApe" class="col-1 mt-3 mr-n4">Apellido</label> 
      <input name="apellido" type="text" class="col-1 form-control mt-2" id="idApe" aria-describedby="ApelliodText">
    <div class="col-4"></div>
  </div>

 <div class="row">
    <div class="col-4"></div>
    <label for="idCorreo" class="col-1 mt-3 ">Correo</label><div class="col-7"></div>
    <div class="col-4"></div>
    <input name="correo" type="email" class="col-4 form-control" id="idCorreo" aria-describedby="emailHelp" placeholder="algo@algo...."><div class="col-4"></div>
  </div>

<div class="row">
    <div class="col-5"></div>
    <button type="submit" class="btn btn-primary col-1 ml-5 mt-3">Registrar</button><div class="col-6"></div>
</div>
</form>

  </body>
</html>