<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$asientos_disponibles = $_POST['asientos_disponibles'];
$precio = $_POST['precio'];


$stmt = $conn->prepare("INSERT INTO VUELO (origen, destino, fecha, asientos_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssid", $origen, $destino, $fecha, $asientos_disponibles, $precio);

if ($stmt->execute()) {
    echo "Vuelo registrado con éxito.";
    header("Location: index.php");
    exit(); 
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
