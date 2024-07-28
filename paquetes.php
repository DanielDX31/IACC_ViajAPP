<?php
session_start();


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = []; 
}


$productos_json = 'paquetes.json'; 


if (file_exists($productos_json)) {
    $productos_disponibles = json_decode(file_get_contents($productos_json), true);
} else {
    echo "Error: No se encuentran paquetes.";
    exit;
}


if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    
    foreach ($productos_disponibles as $producto) {
        if ($producto['id'] == $id_producto) {
            
            $_SESSION['carrito'][] = $producto;
            mostrarNotificacion("Producto agregado al carrito correctamente.");
            break;
        }
    }
}


function mostrarNotificacion($mensaje) {
    echo "<script>
            window.onload = function() {
                alert('$mensaje');
            };
          </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Paquetes - Agencia de Viajes</title>
</head>
<body>
    <div class="header">
        <img src="logo1.png" alt="Logo de la Agencia">
    </div>

    <div class="nav">
        <a href="index.php">Inicio</a>
        <a href="Destinos.html">Destinos</a>
        <a href="Hoteles.html">Hoteles</a>
        <a href="Vuelos.html">Vuelos</a>
        <a href="paquetes.php">Paquetes</a>
        <a href="carrito.php">Ver Carrito</a>
        <?php if (isset($_SESSION['usuario'])): ?>
            <p>Hola, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Cerrar Sesión</a></p>
        <?php else: ?>
            <a href="login.html">Iniciar Sesión</a>
            <a href="registro.html">Registrarse</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <h1>Paquetes Disponibles</h1>
        
        <?php if (!empty($productos_disponibles)): ?>
            <div class="grid-container">
                <?php foreach ($productos_disponibles as $producto): ?>
                    <div class="paquete">
                        <h2><?php echo $producto['ciudad']; ?></h2>
                        <p><strong>Vuelo y Hotel:</strong> <?php echo $producto['vuelo_hotel']; ?></p>
                        <p><strong>Desayuno incluido:</strong> <?php echo $producto['desayuno_incluido'] ? 'Sí' : 'No'; ?></p>
                        <p><strong>Precio (CLP):</strong> <?php echo number_format($producto['precio_clp'], 0, ',', '.'); ?></p>
                        <form action="paquetes.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No hay paquetes disponibles en este momento.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Agencia de Viajes</p>
    </footer>

    <script>
        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
            mostrarNotificacion("Producto agregado al carrito correctamente.");
        <?php endif; ?>

        function mostrarNotificacion(mensaje) {
            alert(mensaje);
        }
    </script>
</body>
</html>
