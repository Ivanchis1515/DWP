<?php
    // Verifica el reCAPTCHA
    $recaptcha_secret = '6LcU5qwpAAAAAPcX3RRmQ4WCWXc05M2pax-fDkXW'; // Reemplaza 'TU_SECRETO_RECAPTCHA' con tu clave secreta de reCAPTCHA
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    ];

    $recaptcha_options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($recaptcha_data)
        ]
    ];

    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    $recaptcha = json_decode($recaptcha_result);

    if (!$recaptcha->success) {
        die("Error: El reCAPTCHA no ha sido validado correctamente.");
    }

    // Recibe los datos del formulario y valida los datos
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $contra = $_POST['contra'];

    if (!$nombre || !$email || !$direccion || !$contra) {
        die("Error: Los datos del formulario no son válidos.");
    }

    // Inserta los datos en la base de datos
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cla', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO usuarios (nombre, direccion, correo, contra, tipo) VALUES (:nombre, :direccion, :email, :contra, :tipo)');
        $stmt->execute(['nombre' => $nombre, 'direccion' => $direccion, 'email' => $email, 'contra' => $contra, 'tipo' => 'Cliente']);

        echo 'Usuario registrado correctamente.';
        // Redirigir al usuario al index después de un registro exitoso
        header("Location: ../index.html");
        exit;
    } catch(PDOException $e) {
        // Si hay un error en la conexión a la base de datos, redirigir al usuario de nuevo a la página de registro
        header("Location: sesion.html");
        exit;
    }
?>
