<?php
session_start();


function mostrarNotificacion($mensaje) {
    echo "<script>
            window.onload = function() {
                alert('$mensaje');
            };
          </script>";
}


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    unset($_SESSION['carrito'][$id]);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Carrito de Compras</title>
</head>
<body>
    <div class="header">
        <img src="logo1.png" alt="Logo de ViajAPP">
    </div>

    <div class="nav">
        <a href="index.php">Inicio</a>
        <a href="paquetes.php">Paquetes</a>
        <a href="carrito.php">Ver Carrito</a>
    </div>

    <div class="container">
        <h2>Carrito de Compras</h2>
        <?php if (empty($_SESSION['carrito'])): ?>
            <p>No hay productos en el carrito.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Ciudad</th>
                    <th>Vuelo y Hotel</th>
                    <th>Desayuno Incluido</th>
                    <th>Precio (CLP)</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
                    <tr>
                        <td><?php echo $producto['ciudad']; ?></td>
                        <td><?php echo $producto['vuelo_hotel']; ?></td>
                        <td><?php echo $producto['desayuno_incluido'] ? 'Sí' : 'No'; ?></td>
                        <td><?php echo number_format($producto['precio_clp'], 0, ',', '.'); ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <form action="finalizar_compra.php" method="post">
                <button type="submit" name="finalizar_compra">Finalizar Compra</button>
            </form>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 ViajAPP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

