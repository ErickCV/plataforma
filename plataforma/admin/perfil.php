
  <?php
  include "headerAdmin.php";
  include "../class/classBaseDatos.php";
  if(isset($_POST['Nombre']))
  {
    $oBD->getBlock("UPDATE usuario SET Nombre='".$_POST['Nombre']."',Apellidos='".$_POST['Apellidos']."', Password=password('".$_POST['Password']."')
    WHERE Id=".$_SESSION['id']);
    $_SESSION['nombre']=$_POST['Nombre'].' '.$_POST['Apellidos'];
    if($_FILES['Foto']['name']>"")
    {
      #de manera fisica
      #move_uploaded_file($_FILES['Foto']['tmp_name'],"../recursos/fotos/".$_FILES['Foto']['name']);
      #ahora vinculando de manera logica
      $arreglo=explode(".",$_FILES['Foto']['name']);#buscando extension, en fotoname esta el nombre completo

      move_uploaded_file($_FILES['Foto']['tmp_name'],"../recursos/fotos/".$_SESSION['id'].".".$arreglo[count($arreglo)-1]);
      $oBD->getBlock("UPDATE usuario SET Foto='".$arreglo[count($arreglo)-1]."' WHERE Id=".$_SESSION['id']);
      $_SESSION['foto']=$_SESSION['id'].".".$arreglo[count($arreglo)-1]."?".rand()%100;
    }
  }
  include "menu.php";


  $usuario=$oBD->getRegistro( "SELECT * FROM usuario WHERE Id=".$_SESSION['id']);
  ?>
  <div class="container">
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
        <form class="" method="post" enctype="multipart/form-data" role="form">
          <fieldset>
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name ="Nombre" class="form-control" id="" placeholder="" value= <?php echo $usuario->Nombre;?> >
            </div>
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" name ="Apellidos" class="form-control" id="" placeholder="" value= <?php echo $usuario->Apellidos;?> >
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="Password" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" name="Foto" class="form-control-file" id="" >
            </div>
            <div class="row">
              <div class="col-5"></div>
              <div class="col-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
              <div class="col-5"></div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="col-3"></div>
    </div>

  </div>

</body>
</html>
