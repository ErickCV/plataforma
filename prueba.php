
<?php
echo 'Calculadora';
print "<hr>";
?>

<form>
Dato A input <input type="text" name="datoA" placeholder="base"><br>
Dato B input <input type="text" name="datoB" placeholder="exponente"><br>
<select name="operacion">
<option value="1"> suma</option>
<option value="2"> resta</option>
<option value="3"> multiplicacion</option>
<option value="4"> division</option>
<option value="5"> raiz</option>
<option value="6"> exponente</option>
<input type="submit" name="">
</form>

<?php

if (isset($_GET['operacion']))
$A=$_GET['datoA'];
$B=$_GET['datoB'];
switch ($_GET['operacion']) {
    case 1:
        $R=$A+$B;
        echo "Resultado: ".$R;
        break;
    case 2:
        $R=$A-$B;
        echo "Resultado: ".$R;
        break;
    case 3:
        $R=$A*$B;
        echo "Resultado: ".$R;
        break;
    case 4:
        $R=($A / $B);
        echo "Resultado: ".$R;
        break;
    case 5:
        $R= pow($A,1/$B);
        echo "Resultado de la raiz ".$B." de ".$A." es: ".$R;
        break;
    case 6:
        $R=pow ($A,$B);
        echo "Resultado de elevar ".$A." a la potencia ".$B." es: ".$R;
        break;
}

?>
