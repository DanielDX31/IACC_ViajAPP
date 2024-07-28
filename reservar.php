<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buscar.css"> 
    <title>Formulario de Reserva</title>
</head>
<body>
    <div class="container">
        <h2>Formulario de Reserva</h2>
        <form id="reservaForm" action="reserva_confirmada.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" required><br>

            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" required><br>

            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br>

            <button type="submit" name="submit">Aceptar</button>
        </form>

        
        <div class="buttons">
            <a href="index.php" class="btn-volver">Volver</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('reservaForm').addEventListener('submit', function(event) {
                event.preventDefault(); 

                
                let nombre = document.getElementById('nombre').value;
                let rut = document.getElementById('rut').value;
                let correo = document.getElementById('correo').value;
                let fechaNacimiento = document.getElementById('fechaNacimiento').value;

                
                alert(`Su reserva ha sido creada, enviaremos un Email con los detalles:\n\nNombre: ${nombre}\nRUT: ${rut}\nCorreo: ${correo}\nFecha de Nacimiento: ${fechaNacimiento}`);

                
                window.location.href = 'index.php';
            });
        });
    </script>
</body>
</html>
