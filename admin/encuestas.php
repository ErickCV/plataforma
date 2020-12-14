<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/custom.css">
<?php
$query="";
include "headerAdmin.php";
include "menu.php";
include "../class/classBaseDatos.php";

if(isset($_POST['accion']))
{
  switch($_POST['accion'])
  {
    case 'delete':
        $oBD->getBlock("DELETE from encuesta where Id=".$_POST['Id']);
        echo $oBD->desplegarTabla("SELECT Id,Titulo,Descripcion,Estatus,IdTipoEncuesta from encuesta where IdUsuario=".$_SESSION['id'],["update","delete"]);
        break;
    case 'formUpdate':
      $registroEdit=$oBD->getRegistro("SELECT * from encuesta where Id=".$_POST['Id']);
    case 'new':
      echo '<div class="container">
                <h4>'.(isset($registroEdit->Id)?"Editar encuesta":"Nueva encuesta").'</h4>
                <form method="post">
                    <input type="hidden" name="accion" value="'.(isset($registroEdit->Id)?"update":"insert").'">';
                                                if(isset($registroEdit->Id))
                                                  echo '<input type="hidden" name="Id" value="'.$registroEdit->Id.'">';
                                                else
                                                  echo '<input type="hidden" name="IdUsuario" value="'.$_SESSION['id'].'">';
                    echo '<div class="row">
                        <label  class="col-md-4">Titulo</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="Titulo" value="'.(isset($registroEdit->Id)?$registroEdit->Titulo:"").'">
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4">Descripción</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="Descripcion">'.(isset($registroEdit->Id)?strval($registroEdit->Descripcion):"").'</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4">Estatus</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="Estatus" value="'.(isset($registroEdit->Id)?$registroEdit->Estatus:"").'">
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4">Id Tipo</label>
                        <div class="col-md-8">';

                        echo  $oBD->creaSelect("TipoEncuesta","Id","Tipo","IdTipoEncuesta",isset($registro->Id)?$registro->IdTipoEncuesta:-1);
                    echo '</div>
                    </div>

                    <div class="row">
                        <div class="col-1" style="margin-left:45%;margin-top:3%;">
                            <input class=" btn-white btn btn-custom" type="submit" value="'.(isset($registroEdit->Id)?"Actualizar":"Aceptar").'">
                        </div>
                    </div>

                </form>
            </div>';
      break;

    case 'update':
    case 'insert':
        $query=($_POST['accion']=="insert")?"INSERT INTO encuesta SET ":"UPDATE encuesta SET ";
        foreach ($_POST as $campo => $valor)
          if(!in_array($campo,($_POST['accion']=="insert")?(array("accion")):(array("accion","Id"))))
            $query.=$campo."='".$valor."', ";
        $query=substr($query,0,-2);
        if($_POST['accion']=="update")
          $query.=" WHERE Id=".$_POST['Id'];
        $oBD->getBlock($query);
        echo $oBD->desplegarTabla("SELECT Id,Titulo,Descripcion,Estatus,IdTipoEncuesta from encuesta where IdUsuario=".$_SESSION['id'],["update","delete"]);
        break;

    // case 'update':
    //   $query="UPDATE encuesta SET ";
    //     foreach ($_POST as $campo => $valor)
    //       if(!in_array($campo,array("accion","Id")))
    //         $query.=$campo."='".$valor."', ";
    //   $query=substr($query,0,-2);//quiero todos menos 2
    //   $query.=" WHERE Id=".$_POST['Id'];
    //   $oBD->getBlock($query);
    //   echo $oBD->desplegarTabla("SELECT Id,Titulo,Descripcion,Estatus,IdTipoEncuesta from encuesta where IdUsuario=".$_SESSION['id'],["update","delete"]);
    //   break;
    // case 'insert':
    //   $query="INSERT INTO encuesta set ";
    //   foreach ($_POST as $campo => $valor)
    //     if(!in_array($campo,array("accion")))
    //       $query.=$campo."='".$valor."', ";
    //   $query=substr($query,0,-2);//quiero todos menos 2
    //   $oBD->getBlock($query);
    //   echo $oBD->desplegarTabla("SELECT Id,Titulo,Descripcion,Estatus,IdTipoEncuesta from encuesta where IdUsuario=".$_SESSION['id'],["update","delete"]);
    //   break;
    default: echo "no programado: ".$_POST['accion'];
  }
}
else
echo $oBD->desplegarTabla("SELECT Id,Titulo,Descripcion,Estatus,IdTipoEncuesta from encuesta where IdUsuario=".$_SESSION['id'],["update","delete"]);

?>
