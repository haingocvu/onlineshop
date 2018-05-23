<?php  
require_once "src/PHPMailer.php";

function sendMail($mailReceiver, $nameReceiver, $subject, $body){
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
	    //Server settings
	    $mail->CharSet = 'UTF-8';
	    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'smtptes007@gmail.com';                 // SMTP username
	    $mail->Password = 'Th@ngKhung123';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('smtptes007@gmail.com', 'OnlineShop');
	    $mail->addAddress($mailReceiver, $nameReceiver);     // Add a recipient
	    // $mail->addAddress('ellen@example.com');               // Name is optional
	    $mail->addReplyTo('smtptes007@gmail.com', 'OnlineShop');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    //Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $body;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    return true;
	} catch (Exception $e) {
	   return false;
	}
}

?>