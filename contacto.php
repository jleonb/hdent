<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contacto@hdent.cl";
    $email_subject = "[CONTACTO HDENT]";
 
    function died($error) {
        // your error code can go here
        echo "Lo sentimos, hubo un error en los datos ingresados.";
        echo "Los errores son los siguientes.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor vuelva a intentarlo.<br /><br />";
        die();
    }
 
    // validation expected data exists
    if(!isset($_POST['nombre']) ||
        !isset($_POST['ciudad']) ||
       !isset($_POST['telefono']) ||
        !isset($_POST['email']) ||        
        !isset($_POST['comentario'])) {
        died('Lo sentimos, hubo un error en los datos ingresados.');       
    }
 
    $nombre = $_POST['nombre']; // required
    $ciudad = $_POST['ciudad']; // required
    $telefono = $_POST['telefono']; // required
    $email_from = $_POST['email']; // required    
    $comentario = $_POST['comentario']; // required
 
//    $error_message = "";
//    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
//  if(!preg_match($email_exp,$email_from)) {
//    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
//  }
//    $string_exp = "/^[A-Za-z\s.'-]+$/";
//  if(!preg_match($string_exp,$first_name)) {
//    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
//  }
//  if(!preg_match($string_exp,$last_name)) {
//    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
//  }
//  if(strlen($comments) < 2) {
//    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
//  }
//  if(strlen($error_message) > 0) {
//    died($error_message);
//  }
    $email_message = "Se ha enviado un mensaje por el formulario de contacto del sitio we.Los datos ingresados son los siguientes.\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Nombre: ".clean_string($nombre)."\n\n";
    $email_message .= "Ciudad: ".clean_string($ciudad)."\n\n";
    $email_message .= "Telefono: ".clean_string($telefono)."\n\n";
    $email_message .= "Email: ".clean_string($email_from)."\n\n";   
    $email_message .= "Comentario: ".clean_string($comentario)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
sleep(2);
echo "<meta http-equiv='refresh' content=\"0; url=index.html\">";
?>
 
<?php
}
?>