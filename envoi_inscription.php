<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require "PHPMailer/src/Exception.php";
  require "PHPMailer/src/PHPMailer.php";
  require "PHPMailer/src/SMTP.php";

  $input_message = isset($_POST["input_message"])? $_POST["input_message"] : NULL;


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
  $mail->Body = "Vous avez reçu une demande de réservation de place pour l'\événement du 20/07/2022 :" ."\n";
  $mail->Body .= "Nom: " .$_POST["input_name"] ."\n";
  $mail->Body .= "Prénom: " .$_POST["input_lastname"] ."\n";
  $mail->Body .= "Email: " .$_POST["input_email"] ."\n";
  $mail->Body .= "Téléphone: " .$_POST["input_tel"] ."\n";
  $mail->Body .= "Nombre de place(s): " .$_POST["input_place"] ."\n";
  $mail->Body .= "Message: " .$input_message ."\n";
  $mail->IsHTML(false);                                  
  if (!$mail->send()) {
    echo $mail->ErrorInfo;  
  } 
  else{
    header('Location: https://www.echiquierpierrefitte.webee-france.fr/index.html');
  }

?>