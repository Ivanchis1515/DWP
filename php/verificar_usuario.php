<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("./funciones.php");

    // Verificar si se ha enviado el formulario POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $email = $_POST["email"];
        $contraseña = $_POST["pass"];

        // Verificar el reCAPTCHA
        $recaptcha_secret = "6LcU5qwpAAAAAPcX3RRmQ4WCWXc05M2pax-fDkXW";
        $recaptcha_response = $_POST['g-recaptcha-response'];

        // Hacer una solicitud POST al servidor de reCAPTCHA
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response
        );

        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success) {
            // El reCAPTCHA fue validado correctamente
            if (conexiones($email, $contraseña)) {
                // Redireccionar según el tipo de usuario
                switch (tipo($email, $contraseña)) {
                    case "Administrador":
                        header("Location: ingreso.php");
                        exit; // Terminar el script después de la redirección
                    case "Moderador":
                        header("Location: ingreso2.php");
                        exit; // Terminar el script después de la redirección
                    case "Cliente":
                        header("Location: ingreso3.php");
                        exit; // Terminar el script después de la redirección
                    default:
                        header("Location: ../sesion.html");
                        exit; // Terminar el script después de la redirección
                }
            } else {
                // Credenciales incorrectas
                echo "Credenciales incorrectas"; // Debugging
                header("Location: ../sesion.html");
                exit; // Terminar el script después de la redirección
            }
        } else {
            // Falló la validación del reCAPTCHA
            header("Location: ../sesion.html");
            exit; // Terminar el script después de la redirección
        }
    } else {
        // Redireccionar si no se envió el formulario correctamente
        header("Location: ../sesion.html");
        exit; // Terminar el script después de la redirección
    }
?>
