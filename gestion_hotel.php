<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Hoteles</title>
    <link rel="stylesheet" href="styles.css"> 
    <script>
        function validarFormularioHotel() {
            const nombre = document.getElementById('nombre').value;
            const ubicacion = document.getElementById('ubicacion').value;
            const habitaciones_disponibles = document.getElementById('habitaciones_disponibles').value;
            const tarifa_noche = document.getElementById('tarifa_noche').value;

            if (!nombre || !ubicacion || !habitaciones_disponibles || !tarifa_noche) {
                alert('Todos los campos son obligatorios.');
                return false;
            }
            if (isNaN(habitaciones_disponibles) || isNaN(tarifa_noche)) {
                alert('Habitaciones disponibles y tarifa por noche deben ser números.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Gestión de Hoteles</h1>
    <form action="procesar_hoteles.php" method="post" onsubmit="return validarFormularioHotel()">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required><br><br>

        <label for="habitaciones_disponibles">Habitaciones Disponibles:</label>
        <input type="number" id="habitaciones_disponibles" name="habitaciones_disponibles" required><br><br>

        <label for="tarifa_noche">Tarifa por Noche:</label>
        <input type="number" id="tarifa_noche" name="tarifa_noche" required><br><br>

        <input type="submit" value="Registrar Hotel">
    </form>
</body>
</html>
