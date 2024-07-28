<?php
session_start();


function mostrarNotificacion($mensaje) {
    echo "<script>
            window.onload = function() {
                alert('$mensaje');
            };
          </script>";
}

if (isset($_SESSION['usuario'])) {
    mostrarNotificacion("¡Bienvenido, " . $_SESSION['usuario'] . "!");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 
    <title>Agencia de Viajes</title>
</head>
<body>
    <div class="header">
        <img src="logo1.png" alt="logoEmpresa">
    </div>

    <div class="nav">
        <div style="position: absolute; top: 10px; left: 10px;">
            <?php if (isset($_SESSION['usuario'])): ?>
                <p>Hola, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Cerrar Sesión</a></p>
            <?php else: ?>
                <a href="login.html">Iniciar Sesión <img src="icono1.png" alt="icono1"></a>
                <a href="registro.html">Regístrate <img src="icono1.png" alt="icono1"></a>
            <?php endif; ?>
        </div>
        <a href="index.php">Inicio <img src="icono1.png" alt="icono1"></a>
        <a href="Destinos.html">Destinos <img src="icono1.png" alt="icono1"></a>
        <a href="Hoteles.html">Hoteles <img src="icono1.png" alt="icono1"></a>
        <a href="Vuelos.html">Vuelos <img src="icono1.png" alt="icono1"></a>
        <a href="paquetes.php">Paquetes <img src="icono1.png" alt="icono1"></a>
        <a href="formulario_reserva.php">Reserva <img src="icono1.png" alt="icono1"></a>
        <a href="gestion_vuelos.php">Gestion de Vuelos <img src="icono1.png" alt="icono1"></a>
        <a href="gestion_hotel.php">Gestion de hoteles <img src="icono1.png" alt="icono1"></a>
        <a href="disponibilidad_hotel.php">disponibilidad de hoteles <img src="icono1.png" alt="icono1"></a>
        <a href="carrito.php">Ver Carrito</a>
        
        </form>
        <form action="buscar.php" method="get">
            <button type="submit" name="submit">Personaliza tu búsqueda</button>
        </form>
    </div>

    <div class="showcase">
        <img src="bannerfinal.png" alt="banner">
    </div>

    <div class="grid-container">
        <div>
            <h2>Las Mejores Ofertas!</h2>
            <p>Descubre las mejores ofertas para tus próximas vacaciones en Chile: disfruta de Santiago con vuelo y hotel desde $150,000 CLP, o relájate en Viña del Mar con desayuno incluido desde $120,000 CLP. ¡Reserva ahora y aprovecha nuestras promociones exclusivas!</p>
            <button onclick="location.href='reservar.php'" class="btn-reservar">Reserva Aquí</button>
        </div>
        <div>
            <h2>Los Mejores Hoteles!</h2>
            <p>Descubre la serenidad de Puerto Varas con nuestro paquete exclusivo: disfruta de 3 días y 2 noches en el encantador Hotel Patagónico, con desayuno incluido, desde $250,000 CLP por persona. ¡Reserva ahora y vive una experiencia única frente al Lago Llanquihue!</p>
            <button onclick="location.href='reservar.php'" class="btn-reservar">Reserva Aquí</button>
        </div>
        <div>
            <h2>Los Vuelos Más Económicos!</h2>
            <p>Explora la belleza de Torres del Paine con nuestras ofertas en vuelos: viaja a Punta Arenas y luego conduce hasta este paraíso natural. Vuelos desde Santiago por solo $120,000 CLP ida y vuelta. ¡Aprovecha esta oportunidad única para descubrir la Patagonia chilena!</p>
            <button onclick="location.href='reservar.php'" class="btn-reservar">Reserva Aquí</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 ViajAPP. Daniel Olivares, Programación WEB II IACC.</p>
    </footer>
</body>
</html>
