<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buscar.css"> 
    <title>Resultados de Búsqueda</title>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreHotel = $_POST['nombreHotel'];
            $ciudad = $_POST['ciudad'];
            $pais = $_POST['pais'];
            $duracion = $_POST['duracion'];
            $fechaViaje = $_POST['fechaViaje'];

            
            echo "<h2>Resultados de Búsqueda:</h2>";
            echo "<p><strong>Hotel:</strong> $nombreHotel</p>";
            echo "<p><strong>Ciudad:</strong> $ciudad</p>";
            echo "<p><strong>País:</strong> $pais</p>";
            echo "<p><strong>Duración:</strong> $duracion días</p>";
            echo "<p><strong>Fecha de Viaje:</strong> $fechaViaje</p>";
        }
        ?>

        <div class="button">
            <a href="reservar.php" class="btn-reservar">Reservar</a>
            <a href="index.php" class="btn-volver">Volver</a>
        </div>
    </div>
</body>
</html>
