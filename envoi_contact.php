<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require "PHPMailer/src/Exception.php";
  require "PHPMailer/src/PHPMailer.php";
  require "PHPMailer/src/SMTP.php";

  $input_address = isset($_POST["input_address"])? $_POST["input_address"] : NULL;
  $input_city = isset($_POST["input_city"])? $_POST["input_city"] : NULL;

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Host = "mask.o2switch.net";               
  $mail->Port = 465;                          
  $mail->SMTPAuth = 1;                       
  $mail->CharSet = "UTF-8";

  if($mail->SMTPAuth){
    $mail->SMTPSecure = "ssl";               
    $mail->Username = "webee@webee-france.fr";    
    $mail->Password = "gyuk*bYBmnJg";         
  }

  $mail->From = trim($_POST["input_email"]); 
  $mail->AddAddress("webee@webee-france.fr");  
  $mail->Subject = "Message du site Les Echiquiers de Pierrefitte";                      
  $mail->Body = "Vous avez reçu un nouveau message via la page Contact:" ."\n";
  $mail->Body .= "Objet: " .$_POST["input_object"] ."\n";
  $mail->Body .= "Nom: " .$_POST["input_name"] ."\n";
  $mail->Body .= "Prénom: " .$_POST["input_lastname"] ."\n";
  $mail->Body .= "Email: " .$_POST["input_email"] ."\n";
  $mail->Body .= "Adresse: " .$input_address ."\n";
  $mail->Body .= "Code postal: " .$_POST["input_zip"] ."\n";
  $mail->Body .= "Ville: " .$input_city ."\n";
  $mail->Body .= "Message: " .$_POST["input_message"] ."\n";
  $mail->IsHTML(false);                                  

  if (!$mail->send()) {
    echo $mail->ErrorInfo;  
  } 
  else{
    echo "<html>
            <head>
              <title>Message Envoyé !</title>
            </head>
            <body onLoad=\"javascript:alert('Le message a bien été envoyé!');window.location='index.html'\">
            </body>
          </html>";
  }

?>