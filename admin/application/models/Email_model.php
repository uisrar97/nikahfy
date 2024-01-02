<?php

class Email_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        require ($_SERVER['DOCUMENT_ROOT'].'/nikahfy/admin/application/third_party/PHPMailer/PHPMailerAutoload.php');
    }


    public function sendNewEmail($to, $emailbody, $subject, $cc='', $bcc='', $toname=''){
           
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        /*try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            /*$mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'email-smtp.us-east-1.amazonaws.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'AKIAI32J6X7DHTERE74Q';                 // SMTP username
            $mail->Password = 'AqIu+kIzkm7YP83RbOUY8jtPMFDqKKL8PMrOl200QHx+';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('no-reply@ondaq.com', 'OnDaQ');
            $mail->addAddress($to, $toname);     // Add a recipient
            $mail->addReplyTo('no-reply@ondaq.com', 'OnDaQ');



            ############ PlanD##############

            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'mail.plandstudios.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = ' noreply@plandstudios.com';                 // SMTP username
            $mail->Password = 'Mypass@123';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('noreply@plandstudios.com', 'OnDaQ');
            $mail->addAddress($to, $toname);     // Add a recipient
            $mail->addReplyTo('noreply@plandstudios.com', 'OnDaQ');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $emailbody;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }*/

        $mail->setFrom('developer@nikahfy.com', 'Nikahfy');
        $mail->addAddress($to, $toname);     // Add a recipient
        $mail->addReplyTo('developer@nikahfy.com', 'Nikahfy');
        $mail->isHTML(true); // Set email format to HTML
        
        $mail->AddCC($cc, $toname);
        $mail->addBCC($bcc, $toname);

        $mail->Subject = $subject;
        $mail->Body    = $emailbody;
        $mail->send();
        return true;
    }

    public function sendUserEmail($to, $emailbody, $subject, $toname='admin')
    {
           
        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        
        $mail->setFrom('developer@nikahfy.com', 'Nikahfy');
        $mail->addAddress($to, $toname);     // Add a recipient
        $mail->addReplyTo('developer@nikahfy.com', 'Nikahfy');
        $mail->isHTML(true); // Set email format to HTML
        
        $mail->Subject = $subject;
        $mail->Body    = $emailbody;
        $mail->send();
        return true;
    }
           
   
}