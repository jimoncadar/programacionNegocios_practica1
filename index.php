<?php
    $error="";
    $hay_post = false;
    $nombre = "";
    $sexo = "";
    $pais = "";
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

    $conexion = new PDO(
        "mysql:dbname=programacionnegocios;127.0.0.1,",
        "root",
        "123456789"    
    );

        

    /* $sql = 'select * from cliente';
    $resultado = $conexion->query($sql);
    foreach($resultado as $registro){
        print($registro['nombreUsuario']);
        print($registro['sexo']);
        print($registro['pais']);
    } */

    //$id = 1;    

    $stm = $conexion->prepare("select * from cliente");
    $stm->execute([]);
    $resultados = $stm->fetchAll();
   /*  foreach ($resultados as $registro) {
        echo $registro['nombreUsuario'].'<br>';
        echo $registro['sexo'].'<br>';
        echo $registro['pais'].'<br>'.'<br>';
    }  */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="txtNombre" id="nombre" value="<?php echo isset($nombre)? $nombre : "" ?>"><br>

        <label for="hombre">Hombre</label>
        <input type="radio" name="radioSexo" id="hombre" value="Hombre" <?php  if($sexo=='Hombre'){echo "checked";} ?> >

        <label for="mujer">Mujer</label>
        <input type="radio" name="radioSexo" id="mujer" value="Mujer" <?php if($sexo=='Mujer'){ echo "checked"; } ?> ><br>
        
        <label for="pais">País</label>
        <select name="cmbPais" id="pais">
            <option value="">Seleccione un país</option>
            <option value="Honduras" <?php echo ($pais=='Honduras')? 'selected' : '' ?> >Honduras</option>
            <option value="Guatemala" <?php echo ($pais=='Guatemala')? 'selected' : '' ?>>Guatemala</option>
            <option value="Mexico" <?php echo  ($pais=='Mexico')? 'selected' : '' ?>>Mexico</option>
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

    <table border="1">
        <thead>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>País</th>
        </thead>
        <tbody>
            <?php foreach($resultados as $registro): ?>
            <tr>
                <td><?php echo $registro['nombreUsuario']; ?></td>
                <td><?php echo $registro['sexo']; ?></td>
                <td><?php echo $registro['pais']; ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>
</html>