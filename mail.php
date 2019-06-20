<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'autoload.php';
if (sendMailToUser() == true AND sendMailToMe() == true) {
    echo 'Mail received to us and i will contact to you ASAP.';
}
function sendMailToUser() {
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'mail.arenagurgaon.com';  // Specify main and backup SMTP servers
    $mail->Host = 'galaxeepro.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'aayush.jaiswal@arenagurgaon.com';                 // SMTP username
    $mail->Username = 'aayush.jaiswal@galaxeepro.com';                 // SMTP username
    $mail->Password = 'jaiswal88@';                           // SMTP password
    // $mail->Password = 'jaiswal88@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                      // TCP port to connect to

    //Recipients
    $to = 'aayush.jaiswal984@gmail.com';
    $firstname = $_POST["fullname"];
    $phone= $_POST["mobile"];
    $email= $_POST["emailid"];
    $text= $_POST["message"];
        
    $mail->setFrom('aayush.jaiswal984@gmail.com', 'Enquiry from Portfolio');
    $mail->addAddress($_POST['emailid'], $_POST['fullname']);     // Add a recipient
    // $mail->addAddress('aayush.jaiswal984@gmail.com');               // Name is optional
    $mail->addReplyTo('aayush.jaiswal984@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Thanks for showing Interest, we will contact to you ASAP.';
    $mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Mail</title>
</head>
<body>
<div style="text-align: center;">
<h1>Aayush Jaiswal Portfolio</h1>
<p>This is a confirmation that we have received your query and we will contact you soon.</p>
<br/><br/>
<a href="http://aj.galaxeepro.com"><img src="http://galaxeepro.com/Tutor/IMG/Garena-Hack-Cracked-Icon.png" alt="http://galaxeepro.com/Tutor/IMG/Garena-Hack-Cracked-Icon.png" style="width: 25%;"></a>
<h4>Phone: <a href="tel:9111471354">+91-9111471354</a></h4>
<h3>All right reserved by Galaxeepro.com</h3>
</div>
</body>
</html>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
function sendMailToMe() {
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'mail.arenagurgaon.com';  // Specify main and backup SMTP servers
    $mail->Host = 'galaxeepro.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'aayush.jaiswal@arenagurgaon.com';                 // SMTP username
    $mail->Username = 'aayush.jaiswal@galaxeepro.com';                 // SMTP username
    $mail->Password = 'jaiswal88@';                           // SMTP password
    // $mail->Password = 'jaiswal88@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                   // TCP port to connect to

    //Recipients
    $to = 'aayush.jaiswal984@gmail.com';
    $firstname = $_POST["fullname"];
    $phone= $_POST["mobile"];
    $email= $_POST["emailid"];
    $text= $_POST["message"];
    
    $mail->setFrom('aayush.jaiswal984@gmail.com', 'Enquiry from Portfolio');
    $mail->addAddress('aayush.jaiswal984@gmail.com', 'Enquiry from Portfolio');     // Add a recipient
    // $mail->addAddress('aayush.jaiswal984@gmail.com');               // Name is optional
    $mail->addReplyTo($_POST['emailid'], $_POST['fullname']);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['fullname'] . ' is showing Interest';
    $mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Mail</title>
</head>
<body>
<div style="text-align: left;">
<h1>Enquiry Detail</h1>
<p><b>Name</b> :'.$_POST['fullname'].'</p>
<p><b>Mobile</b> :'.$_POST['mobile'].'</p>
<p><b>Email</b> :'.$_POST['emailid'].'</p>
<p><b>Message</b> :'.$_POST['message'].'</p>
<br/><br/>
<a href="http://aj.galaxeepro.com"><img src="http://galaxeepro.com/Tutor/IMG/Garena-Hack-Cracked-Icon.png" alt="http://galaxeepro.com/Tutor/IMG/Garena-Hack-Cracked-Icon.png" style="width: 25%;"></a>
</div>
</body>
</html>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>