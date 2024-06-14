<?php

// Verificar si la solicitud es una solicitud AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // La solicitud es AJAX

    // Procesar los datos del formulario y enviar el correo electrónico
    $errorMSG = "";

    // NAME
    if (empty($_POST["name"])) {
        $errorMSG = "Name is required ";
    } else {
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    }

    // EMAIL
    if (empty($_POST["email"])) {
        $errorMSG .= "Email is required ";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errorMSG .= "Invalid email format ";
        } else {
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        }
    }

    // SUBJECT
    if (empty($_POST["subject"])) {
        $errorMSG .= "Subject is required ";
    } else {
        $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    }

    // MESSAGE
    if (empty($_POST["message"])) {
        $errorMSG .= "Message is required ";
    } else {
        $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    }

    if ($errorMSG == "") {
        $EmailTo = "josel.sanchez@upsjb.edu.pe";
        $EmailSubject = "New Message Received";

        // prepare email body text
        $Body = "";
        $Body .= "Name: ";
        $Body .= $name;
        $Body .= "\n";
        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";
        $Body .= "Subject: ";
        $Body .= $subject;
        $Body .= "\n";
        $Body .= "Message: ";
        $Body .= $message;
        $Body .= "\n";

        // send email
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        $success = mail($EmailTo, $EmailSubject, $Body, $headers);

        // responder al cliente
        if ($success){
            echo "success";
        } else {
            echo "Something went wrong :(";
        }
    } else {
        echo $errorMSG;
    }
} else {
    // La solicitud no es AJAX, responde con un mensaje de error
    echo "Access denied";
}
?>
