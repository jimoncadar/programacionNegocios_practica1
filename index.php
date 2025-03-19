<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="archivo2.php" method="get">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="txtNombre" id="nombre"><br>

        <label for="hombre">Hombre</label>
        <input type="radio" name="radioSexo" id="hombre" value="Hombre">

        <label for="mujer">Mujer</label>
        <input type="radio" name="radioSexo" id="mujer" value="Mujer"><br>
        
        <label for="pais">País</label>
        <select name="cmbPais" id="pais">
            <option value="Honduras">Honduras</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Mexico">Mexico</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>