<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$habitaciones_disponibles = $_POST['habitaciones_disponibles'];
$tarifa_noche = $_POST['tarifa_noche'];


$stmt = $conn->prepare("INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);

if ($stmt->execute()) {
    
    header("refresh:1;url=index.php");
    echo "Hotel registrado con éxito. Redireccionando al inicio...";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
