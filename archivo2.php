<?php
   $nombreCompleto = $_REQUEST['txtNombre'];
   $sexo = isset($_REQUEST['radioSexo']) && $_REQUEST['radioSexo']=='Hombre' ? 'Hombre' : 'Mujer';
   $pais = $_REQUEST['cmbPais'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php   
            echo "Nombre:$nombreCompleto<br>";
            echo "Sexo:$sexo<br>";
            echo "País:$pais<br>";
        ?>
    </div>
</body>
</html>