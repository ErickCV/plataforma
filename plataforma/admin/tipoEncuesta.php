<?php
include "headerAdmin.php";
include "menu.php";
include "../class/classBaseDatos.php";
echo $oBD->desplegarTabla("SELECT * from tipoEncuesta",["update","delete"]);
?>
