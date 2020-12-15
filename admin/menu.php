<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Linx Poll</a>
    <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="home.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="encuestas.php">Encuestas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tipoEncuesta.php">Tipo Encuesta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tipoPregunta.php">Tipo Pregunta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfil.php">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../views/index.php">Cerrar Sesion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Acerca de</a>
      </li>
    </ul>
  </div>
  <span class="badge badge-pill badge-secondary" style="font-size: 1em;">
    <img class="minifoto" src="../recursos/fotos/<?php echo $_SESSION['foto']; ?>" alt="" ><?php echo $_SESSION['nombre'];?>
  </span>
</nav>
</body>
</html>
