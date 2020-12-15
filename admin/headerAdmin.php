<?php
session_start();//como este recurso lo usara la misma sesion del usuario esta debe usarse
if(!$_SESSION['nombre'])//si el nombre de la sesion no existe
    header("location: ../views/index.php?m=error D:");

?>
<!DOCTYPE html>
<html lang="es">
<head> 
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css?<?php echo rand(); ?>">
</head>

<body>
