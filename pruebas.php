<link rel="stylesheet" href="css/bootstrap.css">
<?php
include "class/classBaseDatos.php";

function desplegarTabla($query,$iconos=array(),$colorTabla="table-primary",$ancho=array())
{
  global $oBD;
  $registros=$oBD->getBlock($query);
  $columnas=mysqli_num_fields($registros);
  echo '<table class="table table-hover"'.$colorTabla.'">';
  //cabecera
  echo '<tr class="table-secondary">';
  if(count($iconos))
  {
    foreach ($iconos as $icono)
    {
      echo '<td style="width:3% !important" > &nbsp; </td>';
    }
  }
  if(count($ancho))
    for ($j=0; $j < $columnas; $j++)
    {
      $campo=mysqli_fetch_field_direct($registros,$j);//informacion de un campo(bloque,columna)
      echo '<td style="width:'.$ancho[$j].'% !important" >'.$campo->name.'</td>';
    }
  else
    for ($j=0; $j < $columnas; $j++)
    {
      $campo=mysqli_fetch_field_direct($registros,$j);//informacion de un campo(bloque,columna)
      echo '<td style="width:'.(100/$columnas).'% !important" >'.$campo->name.'</td>';
    }

  echo '</tr>';
  //fin cabecera
  for ($i=0; $i < $oBD->nRegistros; $i++)
  {
    echo '<tr>';

    if(in_array("update",$iconos))
    {
      echo '<td > <img src="recursos/imagenes/edit.png"> </td>';
    }
    if(in_array("delete",$iconos))
    {
      echo '<td > <img src="recursos/imagenes/delete.png"> </td>';
    }

    $campos=mysqli_fetch_array($registros);
    for ($j=0; $j < $columnas; $j++)
        echo '<td >'.$campos[$j].'</td>';
    echo '</tr>';
  }
  echo '</table>';
}

?>
<form method="get">
  <input value="" type="text" name="ancho" placeholder="" style="margin-left:2%;margin-top:2%">
  <button type="submit">Mostrar</button>
</form>

<?php

if(isset($_GET['ancho']))
  desplegarTabla("SELECT * FROM tipoEncuesta",array("update","delete"),"table-secondary",$anchos=array(60,60));
?>
