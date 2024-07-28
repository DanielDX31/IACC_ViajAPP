<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buscar.css">
    <title>Formulario de Búsqueda</title>
</head>
<body>
    <div class="container">
        <form id="buscar" action="resultadoBusqueda.php" method="post">
            <label for="nombreHotel">Hotel:</label>
            <input type="text" id="nombreHotel" name="nombreHotel" required><br>

            <label for="ciudad">Destino:</label>
            <input type="text" id="ciudad" name="ciudad" required><br>

            <label for="pais">País de Destino:</label>
            <input type="text" id="pais" name="pais" required><br>

            <label for="duracion">Duración del Viaje (días):</label>
            <input type="number" id="duracion" name="duracion" required><br>

            <label for="fechaViaje">Fecha de Viaje:</label>
            <input type="date" id="fechaViaje" name="fechaViaje" required><br>

            <input type="submit" value="Buscar">
        </form>
    </div>
</body>
</html>
