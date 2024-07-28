
    
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT h.id_hotel, h.nombre AS nombre_hotel, h.ubicacion, COUNT(r.id_reserva) AS num_reservas
        FROM HOTEL h
        LEFT JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel, h.nombre, h.ubicacion";

$result = $conn->query($sql);

$hoteles = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hoteles[$row['id_hotel']] = [
            'nombre' => $row['nombre_hotel'],
            'ubicacion' => $row['ubicacion'],
            'num_reservas' => $row['num_reservas']
        ];
    }
}


$sql_todos = "SELECT h.nombre AS nombre_hotel, h.ubicacion, COUNT(r.id_reserva) AS num_reservas
              FROM HOTEL h
              LEFT JOIN RESERVA r ON h.id_hotel = r.id_hotel
              GROUP BY h.nombre, h.ubicacion";

$result_todos = $conn->query($sql_todos);


$hoteles_todos = array();
if ($result_todos->num_rows > 0) {
    while ($row = $result_todos->fetch_assoc()) {
        $hoteles_todos[] = [
            'nombre' => $row['nombre_hotel'],
            'ubicacion' => $row['ubicacion'],
            'num_reservas' => $row['num_reservas']
        ];
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Disponibilidad en Hoteles</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h1>Disponibilidad en Hoteless</h1>
    <form action="" method="get">
        <label for="filtroHoteles">Selecciona un hotel:</label>
        <select name="filtroHoteles" id="filtroHoteles">
            <option value="">Seleccione un hotel...</option>
            <?php
            foreach ($hoteles as $id => $hotel) {
                echo "<option value='$id'>{$hotel['nombre']} en {$hotel['ubicacion']}</option>";
            }
            ?>
            <option value="todos">Mostrar todos los hoteles</option>
        </select>
        <input type="submit" value="Consultar">
    </form>

    <?php
   
    if (isset($_GET['filtroHoteles'])) {
        $filtro = $_GET['filtroHoteles'];

       
        if ($filtro == 'todos') {
            echo "<h2>Todos los hoteles:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Hotel</th><th>Ubicación</th><th>Reservas</th></tr>";
            foreach ($hoteles_todos as $hotel) {
                echo "<tr><td>{$hotel['nombre']}</td><td>{$hotel['ubicacion']}</td><td>{$hotel['num_reservas']}</td></tr>";
            }
            echo "</table>";
        } elseif (array_key_exists($filtro, $hoteles)) {
           
            $hotelSeleccionado = $hoteles[$filtro];
          
            if ($hotelSeleccionado['num_reservas'] >= 2) {
                echo "<h2>Hotel con más de 2 reservas:</h2>";
                echo "<p>{$hotelSeleccionado['nombre']} en {$hotelSeleccionado['ubicacion']}</p>";
                echo "<p>Número de reservas: {$hotelSeleccionado['num_reservas']}</p>";
            } else {
                echo "<p>{$hotelSeleccionado['nombre']} en {$hotelSeleccionado['ubicacion']} no tiene más de 2 reservas.</p>";
            }
        } else {
            echo "<p>Seleccione un hotel válido o la opción para mostrar todos los hoteles.</p>";
        }
    }
    
    ?>
    <form action="index.php">
        <input type="submit" value="Volver al Inicio">
    </form>



</body>
</html>
