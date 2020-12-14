
<?php
//include "classBD.php"; 

$cadena="ABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789";
$numeC=strlen($cadena);//strlen gets the string lenght
$nuevPWD="";
for ($i=0; $i<8; $i++)
  $nuevPWD.=$cadena[rand()%$numeC]; //concatenando una caracter aleatorio de la cadena

include("class/classBaseDatos.php");
include("servicios/class.phpmailer.php");
include("servicios/class.smtp.php");

$mail = new PHPMailer();// '->' indica uso, como '.' en java
$mail->IsSMTP();
    $mail->Host="smtp.gmail.com"; //mail.google
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Port = 465;     // set the SMTP port for the GMAIL server
    $mail->SMTPDebug  = 1;  // enables SMTP debug information (for testing)
                              // 1 = errors and messages
                              // 2 = messages only
                              // 0 when its all ok
    $mail->SMTPAuth = true;   //enable SMTP authentication

    $mail->Username =   "16030835@itcelaya.edu.mx"; // SMTP account username
    $mail->Password = "vademecum11dpr2474dd";  // SMTP account password

    $mail->From="";
    $mail->FromName="";
    $mail->Subject = "Registro completo";
    $mail->MsgHTML("<h1>BIENVENIDO ".$_POST['nombre']." ".$_POST['apellido']."</h1><h2> tu clave de acceso es : ".$nuevPWD."</h2>");
    $mail->AddAddress($_POST['correo']);//se pueden agregar cuantos se quieran al objeto y se iran almacenando
    //$mail->AddAddress("admin@admin.com");
    if (!$mail->Send())
          echo  "Error: " . $mail->ErrorInfo;
    else {
            $query ="SELECT Email from usuario where Email='".$_POST['email']."';";
            $registro=$oBD->getRegistro($query);
            if($oBD->nRegistros==1){
                $query=" INSERT INTO usuario SET Nombre='".$_POST['nombre']."', Apellidos='".$_POST['apellido']."', Email='".$_POST['correo']."', Password=password('".$nuevPWD."')";
                $registro=$oBD->insertRegistro($query);
                header("location: views/signup.html?m=1");
            }
            else
                header("location: views/index.html?m=2");
        }
?>
