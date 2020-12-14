<?php
session_start();
include "class/classBaseDatos.php";

$cad = "SELECT * FROM usuario where Email='".$_POST['correo']."' and Password=password('".$_POST['clave']."')";
$registro =$oBD->getRegistro($cad);
//mysqli_query($conexion, $cad);
//if(mysqli_num_rows($bloque)==1)
if($oBD->nRegistros==1)
    {
        //$registro = mysqli_fetch_object($bloque);
        $_SESSION['nombre']=$registro->Nombre.' '.$registro->Apellidos;//datos del primer registro de la consulta
        $_SESSION['id']=$registro->Id;
        $_SESSION['email']=$registro->Email;
        $_SESSION['foto']=$registro->Id.".".$registro->Foto;
        header("location: admin/home.php");
    }
else
{
   header("location: views/login.php?m=1");
   $_SESSION['error']="Escribe bien";
}
?>
