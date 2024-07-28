<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_origen'])) {
    
    $origen = $_POST['origen'];

   
    $_SESSION['origen'] = $origen;

    
    $sql_destinos = "SELECT DISTINCT destino FROM VUELO WHERE origen = '$origen'";

    
    $result_destinos = $conn->query($sql_destinos);

    
    if ($result_destinos->num_rows > 0) {
?>
        <form action="formulario_reserva.php" method="POST">
            <label for="destino">Destino:</label>
            <select name="destino" id="destino">
                <option value="">Seleccione un destino</option>
                <?php
                while ($row_destino = $result_destinos->fetch_assoc()) {
                    $destino = $row_destino['destino'];
                    echo "<option value='$destino'>$destino</option>";
                }
                ?>
            </select>
            <button type="submit" name="consultar_destino">Consultar Destino</button>
        </form>
<?php
    } else {
        echo "No se encontraron destinos para el origen seleccionado.";
    }

    
    $conn->close();
    exit; 
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar_destino'])) {
   
    $destino = $_POST['destino'];

    
    $_SESSION['destino'] = $destino;

    
    $sql_hoteles = "SELECT nombre FROM HOTEL WHERE ubicacion = '$destino'";

    
    $result_hoteles = $conn->query($sql_hoteles);

    
    if ($result_hoteles->num_rows > 0) {
?>
        <form action="procesar_reserva.php" method="POST">
            <label for="hotel">Hotel:</label>
            <select name="hotel" id="hotel">
                <option value="">Seleccione un hotel</option>
                <?php
                while ($row_hotel = $result_hoteles->fetch_assoc()) {
                    $hotel = $row_hotel['nombre'];
                    echo "<option value='$hotel'>$hotel</option>";
                }
                ?>
            </select><br><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" required><br><br>
            <button type="submit" name="reservar">Reservar</button>
        </form>
<?php
    } else {
        echo "No se encontraron hoteles para el destino seleccionado.";
    }

    
    $conn->close();
    exit; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Reserva</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <form action="formulario_reserva.php" method="POST">
        <label for="origen">Origen:</label>
        <select name="origen" id="origen">
            <option value="">Seleccione un origen</option>
            <?php
            
            $sql_origenes = "SELECT DISTINCT origen FROM VUELO";

            
            $result_origenes = $conn->query($sql_origenes);

            
            while ($row_origen = $result_origenes->fetch_assoc()) {
                $origen = $row_origen['origen'];
                echo "<option value='$origen'>$origen</option>";
            }
            ?>
        </select>
        <button type="submit" name="consultar_origen">Consultar Origen</button>
    </form>
</body>
</html>
