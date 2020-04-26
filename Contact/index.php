<?php
require 'PHPMailerAutoload.php';
if(isset($_POST['envoyer'])){
$mail = new PHPMailer;

$email = $_POST['email'];
$message = $_POST['msg'];
//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreply.coatme@gmail.com';               // SMTP username
$mail->Password = 'kerdounamahri@2020';                      // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  

$mail->setFrom('noreply.coatme@gmail.com', 'COAT_ME Company');
$mail->addAddress($email, 'COAT_ME Contact');     // Add a recipient
//$mail->addReplyTo($email, 'Information');
$mail->isHTML(true); 

$mail->Subject = 'COAT_ME Contact';
$mail->Body    = 'Nous avons reçu votre Message : '.'<b>'.$message.'</b>.'.' <br> Vous recevrez notre Message dés que possible.';

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
}
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<div id="popup" class="popup">';
    echo 'Message has been sent';
    echo '</div>';
    date_default_timezone_set('UTC');

    $fp = fopen('email.txt','a+');
    $ligne = fputs($fp,$email.'|'.$message.'|'.date("Y-m-d H:i:s")."\n");
    fclose($fp);

}
?>