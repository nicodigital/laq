<?php if ($_POST) {
    
    /* Coloca aquí la clave secreta de Google reCaptcha  */
    $recaptcha_secret   = "6LdYLT0bAAAAAOoF4F3VvtoptW1EboMnXW8FCFd4";

    $data = array(
        'secret'    =>  $recaptcha_secret,
        'response'  => $_POST['recaptcha_response']
    );

    $verify_response = curl_init();
    curl_setopt($verify_response, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify' );
    curl_setopt($verify_response, CURLOPT_POST, true);
    curl_setopt($verify_response, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify_response, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($verify_response, CURLOPT_RETURNTRANSFER, true);
    $response_data = curl_exec($verify_response);

    // Decode json data
    $response_data = json_decode($response_data);
    
    if ( $response_data->success ) { 

        $site_title     = "LAQ"; //Site Title
        $to_email       = "nicolook.pro@gmail.com";
        // $to_email       = "info@hr.com.uy,nicolas@id.net.uy";
        $subject        = "laq.com.uy - Email LAQ"; //Replace with your email default subject

        /* Mensajes */
        $success_mssg   = "Tu mensaje ha sido enviado exitosamente. Gracias.";               
        $error_mssg     = "Se ha producido un error. Por favor, compruebe su configuración de correo electrónico PHP."; 
        $short_mssg     = "Mensaje demasiado corto! Por favor, introduzca algo.";                       
        $empty_fields   = "Los campos de entrada están vacíos. Por favor, introduzca algo.";                  
        $name_mssg      = "El nombre es demasiado corto o vacío! Por favor, introduzca algo.";              
        $email_mssg     = "Por favor introduzca una dirección de correo electrónico válida";                                       // Valid email

        //Check $_POST vars are set, exit if any missing
        if (!isset($_POST["field_name"]) || !isset($_POST["field_email"]) || !isset($_POST["field_phone"]) || !isset($_POST["field_message"])) {
            $output = json_encode(array('type' => 'error', 'text' => $empty_fields));
            die($output);
        }

        //Sanitize input data using PHP filter_var(). *PHP 5.2.0+
        $field_name        = filter_var($_POST["field_name"], FILTER_SANITIZE_STRING);
        $field_email       = filter_var($_POST["field_email"], FILTER_SANITIZE_EMAIL);
        $field_phone       = filter_var($_POST["field_phone"], FILTER_SANITIZE_NUMBER_INT);
        $field_message     = filter_var($_POST["field_message"], FILTER_SANITIZE_STRING);
        $field_message     = htmlspecialchars($field_message);
        // $field_news     = $_POST["field_news"];

        //Additional php validation
        // If length is less than  it will throw an HTTP error.
        if ( strlen($field_name) < 4 ) {
            $output = json_encode(array('type' => 'error', 'text' => $name_mssg));
            die($output);
        }

        //Check Email
        if ( !filter_var( $field_email, FILTER_VALIDATE_EMAIL ) ) {
            $output = json_encode(array('type' => 'error', 'text' => $email_mssg));
            die($output);
        }

        //Check Message
        if ( strlen($field_message) < 10 ) {
            $output = json_encode(array('type' => 'error', 'text' => $short_mssg));
            die($output);
        }

        //Headers
        $headers = 'From: ' . $site_title . ' <' . $field_email . '>' . PHP_EOL .
            'Reply-To: ' . $field_name . ' <' . $field_email . '>' . PHP_EOL .
            'MIME-Version: 1.0' . PHP_EOL .
            'Content-type:text/html;charset=UTF-8' . PHP_EOL .
            'X-Mailer: PHP/' . phpversion();

        $message = "Nombre: $field_name <br><br>
                    Email: $field_email <br><br> 
                    Tel: $field_phone <br><br> 
                    Consulta: $field_message";

        $sendemail = @mail($to_email, $subject, $message, $headers);

        if (!$sendemail) {

            $output = json_encode(array('type' => 'error', 'text' => $error_mssg));
            die($output);

        } else {

            $output = json_encode(array('type' => 'message', 'text' => $success_mssg));
            die($output);
            
        }

    } else {

        $output = json_encode(array('type' => 'message', 'text' => 'Me parece que eres un robot.' ));
        die($output);
        // header('Location: ../404.php');

    }

}