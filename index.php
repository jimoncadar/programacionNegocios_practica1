<?php
    $error="";
    $hay_post = false;

    if(isset($_REQUEST['submit1'])){
        $hay_post = true;
        $nombre = isset($_REQUEST['txtNombre']) ? $_REQUEST['txtNombre'] : "";
        $sexo = isset($_REQUEST['radioSexo']) ? $_REQUEST['radioSexo'] : "";

        $pais = isset($_REQUEST['cmbPais']) ? $_REQUEST['cmbPais'] : "";

        if(!empty($nombre)){
            $nombre = preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚ]/u","",$nombre);
        }
        else{
            $error .= "El nombre no puede esta vácio<br>";
        }

        if($sexo == ""){
            $error .= "Seleccione un sexo.<br>";
        }
        
        if($pais==""){
            $error .= "Seleccione un país";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="txtNombre" id="nombre"><br>

        <label for="hombre">Hombre</label>
        <input type="radio" name="radioSexo" id="hombre" value="Hombre">

        <label for="mujer">Mujer</label>
        <input type="radio" name="radioSexo" id="mujer" value="Mujer"><br>
        
        <label for="pais">País</label>
        <select name="cmbPais" id="pais">
            <option value="">Seleccione un país</option>
            <option value="Honduras">Honduras</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Mexico">Mexico</option>
        </select><br>
        <input type="submit" value="Enviar" name="submit1">
    </form>
    <?php
        if($error){
            echo "<p style='color:red;'>$error</p>";
        }
        elseif($hay_post){
            echo "Nombre:$nombre<br>";
            echo "Sexo:$sexo<br>";
            echo "País:$pais";
        }
    ?>
</body>
</html>