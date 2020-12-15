<?php
class BaseDatosPlataforma
{
  var $conexion;
  var $nRegistros;
  var $error;
  function BaseDatos()
  {}

  function conecta()//
  {
    $this->conexion = mysqli_connect("localhost","encuestador","305279","encuestas");
  }

  function cierra()
  {
    mysqli_close($this->conexion);
  }

  function getBlock($query)
  {
    $this->conecta();
    $tupla=mysqli_query($this->conexion,$query);
    if(strpos(strtoupper($query),"SELECT")!==false)
      $this->nRegistros=mysqli_num_rows($tupla);
    else
      $this->nRegistros=0;

    $this->error=mysqli_error($this->conexion);
    if($this->error >""){
      echo $query." -> ".$this->error;
      exit;
    }
    $this->cierra();
    return $tupla;
  }

  function getRegistro($query)
  {
    $this->conecta();
    $bloque=mysqli_query($this->conexion,$query);
    $this->nRegistros=mysqli_num_rows($bloque);
    $this->cierra();
    return mysqli_fetch_object($bloque);
  }

  function insertRegistro($query)
  {
    $this->conecta();
    $bloque=mysqli_query($this->conexion,$query);
    $this->cierra();
  }

//////////////////////////////////////////////////////

  function desplegarTabla($query,$iconos=array(),$colorTabla="table-primary",$ancho=array())
  {
    $registros=$this->getBlock($query);
    $columnas=mysqli_num_fields($registros);
    $result='<div class="container"> <table class="table table-hover"'.$colorTabla.'">';
    //cabecera
    $result.= '<tr class="table-secondary">';
    if(count($iconos))
    {
        $result.= '<td colspan="'.count($iconos).'" style="width:3% !important" >
                  <form method="post">
                    <input type="hidden" name="accion" value="new" />
                    <input type="image" src="../recursos/imagenes/add.png" >
                  </form>
        </td>';
    }
    if(count($ancho))
      for ($j=0; $j < $columnas; $j++)
      {
        $campo=mysqli_fetch_field_direct($registros,$j);//informacion de un campo(bloque,columna)
        $result.= '<td style="width:'.$ancho[$j].'% !important" >'.$campo->name.'</td>';
      }
    else
      for ($j=0; $j < $columnas; $j++)
      {
        $campo=mysqli_fetch_field_direct($registros,$j);//informacion de un campo(bloque,columna)
        $result.= '<td style="width:'.(100/$columnas).'% !important" >'.$campo->name.'</td>';
      }

    $result.= '</tr>';
    //fin cabecera
    for ($i=0; $i < $this->nRegistros; $i++)
    {
      $result.= '<tr>';
      $campos=mysqli_fetch_array($registros);

      if(in_array("update",$iconos))
      {
        $result.= '<td>
                        <form method="post">
                          <input type="hidden" name="Id" value="'.$campos['Id'].'" />
                          <input type="hidden" name="accion" value="formUpdate" />
                          <input type="image" src="../recursos/imagenes/edit.png" >
                        </form>
                  </td>';
      }
      if(in_array("delete",$iconos))
      {
        $result.= '<td >
                        <form method="post">
                          <input type="hidden" name="Id" value="'.$campos['Id'].'" />
                          <input type="hidden" name="accion" value="delete" />
                          <input type="image" src="../recursos/imagenes/delete.png" >
                        </form>
                  </td>';
      }

      for ($j=0; $j < $columnas; $j++)
          $result.= '<td >'.$campos[$j].'</td>';
      $result.= '</tr>';
    }
    $result.= '</table></div>';
    return $result;
  }

  function creaSelect($tabla,$PK,$campoDesplegar,$nameSelect,$IdSeleccionado=0)
  {
    $cad="SELECT ".$PK." as PK,".$campoDesplegar." as dato FROM ".$tabla." ORDER BY ".$campoDesplegar;
    $registros= $this->getBlock($cad);
    $result='<select class="form-control" name="'.$nameSelect.'">';
    $result.='<option value="0">Selecciona</option>';
    foreach ($registros as $registro)
    {
      $result.='<option value="'.$registro['PK'].'"'.(($IdSeleccionado==$registro['PK'])?"selected":"").'>'.$registro['dato'].
                '</option>';
    }
    $result.='</select>';
    return $result;
  }

}

$oBD=new BaseDatosPlataforma();
?>
