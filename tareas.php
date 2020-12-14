<?php
#session_start();
$archivo="";
$archivos=array();
$iconos=array();
$icono="";
$extension="";
$i=0;

if(isset($_POST['Button']))
  if(($_FILES['Archivo']['name'])>"")
  {

    $arreglo=explode(".",$_FILES['Archivo']['name']);
    $extension=$arreglo[count($arreglo)-1];
    move_uploaded_file($_FILES['Archivo']['tmp_name'],"src/archivos/".$_FILES['Archivo']['name']);

    if(strval($extension)=="doc" || strval($extension)=="docx")
      $icono='<img src="https://drive.google.com/uc?id=127WoPOjJZ5D07oPBzBddQ5vDI9WSnwy-" alt="">';
    if(strval($extension)=="xls" || (strval($extension)=="xlsx"))
      $icono='<img src="https://drive.google.com/uc?id=16kncXj_QJFdyX1W3azWY7SAInH_JFNYr" alt="">';
    if(strval($extension)=="ppt" || (strval($extension)=="pptx"))
      $icono='<img src="https://drive.google.com/uc?id=1-VeRPO3RnGPRs7ddQNWrgQ9S-Hlw9LNH" alt="">';
    if(strval($extension)=="pdf")
      $icono='<img src="https://drive.google.com/uc?id=1GtK8inLECqRzGk01ghwl3ItX205HvePf" alt="">';
    if(strval($extension)=="txt")
      $icono='<img src="https://drive.google.com/uc?id=1JZHVQKAxyjNA0K4-RGnIrjgtdkhaj5H-" alt="">';
    if(strval($extension)=="jpg" || strval($extension)=="png" || strval($extension)=="jpeg")
      $icono='<img src="https://drive.google.com/uc?id=1sxivY5KgEwIuf0nKWe2LB1KT4uqtgMLc" alt="">';


    $archivo=$icono." ".'<a class="white" target="_blank" href="src/archivos/'.$_FILES['Archivo']['name'].'" >'.$_FILES['Archivo']['name'].'</a> </br>';
    #$archivo='<a class="white" target="_blank" href="src/archivos/'.$_FILES['Archivo']['name'].'" >'.$_FILES['Archivo']['name'].'</a> </br>';

    #$_SESSION['archivos'].=$icono.$archivo."*";
    #print_r($_SESSION);
    #$archivos=explode("*",$_SESSION['archivos']);
    #print_r($archivos);
  }
?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/lux.css">
  </head>
  <body class="backgroundLightGray">
    <div class="container">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
          <div class="card text-white bg-dark mb-3" style="margin-top: 5%;border-radius: 1%;">
            <div class="form-group">
              <div class="card-body">
                <form class="" action="tareas.php" method="post" enctype="multipart/form-data" role="form">
                  <fieldset>
                    <div class="form-group">
                      <label for="exampleInputFile">Archivo</label>
                      <input name="Archivo" type="file" class="form-control-file" id="" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf, .txt">
                    </div>
                    <button  type="submit" name="Button" class="btn btn-secondary" style="margin-left:27%;">Aceptar</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card text-white bg-dark mb-3" style="margin-top: 5%;border-radius: 1%;">
            <div class="card-body">
              <?php
                #for ($k=0; $k < count($archivos)-1; $k++)
                #  echo $archivos[$k];
                echo $archivo;
              ?>
            </div>
          </div>
        </div>
        <div class="col-2"></div>
      </div>
    </div>
  </body>
</html>
