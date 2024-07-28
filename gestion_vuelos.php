<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vuelos</title>
    <link rel="stylesheet" href="styles.css"> 
    <script>
        function validarFormularioVuelo() {
            const origen = document.getElementById('origen').value;
            const destino = document.getElementById('destino').value;
            const fecha = document.getElementById('fecha').value;
            const asientos_disponibles = document.getElementById('asientos_disponibles').value;
            const precio = document.getElementById('precio').value;

            if (!origen || !destino || !fecha || !asientos_disponibles || !precio) {
                alert('Todos los campos son obligatorios.');
                return false;
            }
            if (isNaN(asientos_disponibles) || isNaN(precio)) {
                alert('Asientos disponibles y precio deben ser números.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Gestión de Vuelos</h1>
    <form action="procesar_vuelo.php" method="post" onsubmit="return validarFormularioVuelo()">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" required><br><br>

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="asientos_disponibles">Asientos Disponibles:</label>
        <input type="number" id="asientos_disponibles" name="asientos_disponibles" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br><br>

        <input type="submit" value="Registrar Vuelo">
    </form>
</body>
</html>