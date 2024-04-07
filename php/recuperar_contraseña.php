<?php
// Verificar si se ha enviado el formulario
if (isset($_POST['email'])) {
    // Obtener el correo electrónico proporcionado por el usuario
    $email = $_POST['email'];

    // Realizar la conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cla";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la contraseña asociada con el correo electrónico
    $sql = "SELECT contra FROM usuarios WHERE correo = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encuentra el correo electrónico en la base de datos, enviar la contraseña por correo
        $row = $result->fetch_assoc();
        $retrievedPassword = $row['contra'];

        // Envío de correo electrónico con la contraseña recuperada
        $subject = 'Recuperación de Contraseña';
        $message = "Su contraseña es: $retrievedPassword";
        $headers = 'From: ivannhdz03@gmail.com'; // Cambia esto por tu dirección de correo electrónico

        // Envía el correo electrónico
        $mailSent = mail($email, $subject, $message, $headers);

        if ($mailSent) {
            // Redirige al usuario al inicio de sesión si se envió correctamente el correo
            header("Location: ../sesion.html");
            exit; // Detiene la ejecución del script después de redirigir
        } else {
            // Si falla el envío del correo, redirige de nuevo al formulario de recuperación
            header("Location: ../forgot.html");
            exit; // Detiene la ejecución del script después de redirigir
        }
    } else {
        // Si no se encuentra ninguna cuenta asociada con ese correo electrónico, redirige al formulario de recuperación
        header("Location: ../forgot.html");
        exit; // Detiene la ejecución del script después de redirigir
    }

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si no se envió el formulario correctamente, redirige al formulario de recuperación
    header("Location: ../forgot.html");
    exit; // Detiene la ejecución del script después de redirigir
}
?>
