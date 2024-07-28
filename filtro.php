<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="buscar.css">
</head>
<body>
    <div class="container">
        <?php
        $jsonFile = 'paquetes.json';
        $jsonData = file_get_contents($jsonFile);
        $paquetes = json_decode($jsonData, true);

        if (isset($_POST['submit'])) {
            $ciudad = $_POST['ciudad'];
            $ciudad = strtolower($ciudad);

            $paquetesFiltrados = array_filter($paquetes, function($paquete) use ($ciudad) {
                $ciudadPaquete = strtolower($paquete['ciudad']);
                
                return $ciudadPaquete === $ciudad || ($ciudad === 'isla de pascua' && $ciudadPaquete === 'easter island');
            });

            if (!empty($paquetesFiltrados)) {
                echo "<h2>Paquetes en " . htmlspecialchars($_POST['ciudad']) . ":</h2>";
                foreach ($paquetesFiltrados as $paquete) {
                    echo "<div class='paquete'>";
                    echo "<p><strong>Ciudad:</strong> " . htmlspecialchars($paquete['ciudad']) . "</p>";
                    echo "<p><strong>Vuelo y Hotel:</strong> " . htmlspecialchars($paquete['vuelo_hotel']) . "</p>";
                    echo "<p><strong>Desayuno incluido:</strong> " . ($paquete['desayuno_incluido'] ? 'Sí' : 'No') . "</p>";
                    echo "<p><strong>Precio (CLP):</strong> " . number_format($paquete['precio_clp'], 0, ',', '.') . "</p>";
                    echo "</div>"; 
                }
            } else {
                echo "<p>No se encontraron paquetes en " . htmlspecialchars($_POST['ciudad']) . ".</p>";
            }
        }
        ?>
        
        <div class="buttons">
            <button onclick="location.href='index.php'" class="btn-volver">Volver</button>
            <button onclick="location.href='reservar.php'" class="btn-reservar">Reservar</button>
        </div>
    </div>
</body>
</html>


