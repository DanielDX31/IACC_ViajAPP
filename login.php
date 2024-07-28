<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "registro_usuarios";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $user = $result->fetch_assoc();

   
    if (password_verify($password, $user['password'])) {
      
        $_SESSION['usuario'] = $user['nombre'];
        header("Location: index.php?mensaje=sesion_iniciada");
    } else {
        
        header("Location: login.html?error=contraseña_incorrecta");
    }
} else {
    
    header("Location: login.html?error=usuario_no_encontrado");
}

$conn->close();
?>
