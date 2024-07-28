<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$origen = $_SESSION['origen'];
$destino = $_SESSION['destino'];
$hotel = $_POST['hotel'];
$nombre = $_POST['nombre'];
$rut = $_POST['rut'];


$sql_insert = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel)
              VALUES ('$rut', NOW(), 
                      (SELECT id_vuelo FROM VUELO WHERE origen = '$origen' AND destino = '$destino'),
                      (SELECT id_hotel FROM HOTEL WHERE nombre = '$hotel' AND ubicacion = '$destino'))";

if ($conn->query($sql_insert) === TRUE) {
    echo "Reserva realizada correctamente.";

    
    header("refresh:1; url=index.php");
    exit; 
} else {
    echo "Error al realizar la reserva: " . $conn->error;
}


$conn->close();
?>
