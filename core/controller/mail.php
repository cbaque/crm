<?php
class mail {

	public static function enviarcorreo() {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                      //Enable verbose debug o utput
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.primarysoft.group';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'admin@primarysoft.group';                     //SMTP username
            $mail->Password   = '@Dmin2023*';                               //SMTP password
            $mail->SMTPSecure = ssl;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('admin@primarysoft.group', 'CRM Admin');

            session_start();
            $user_id = $_SESSION["user_id"];
            $conexion=mysqli_connect("localhost","primarys_soporte","Soporte2023*","primarys_soporte");               
            $sql="SELECT email FROM user where id=$user_id;";
            $cadena = mysqli_query($conexion, $sql);
            $array = explode(";", $cadena['email']);

            foreach ($array as &$valor) {
                $mail->addAddress($valor); 
            }

            //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient

            
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '⚡Nuevo ticket de soporte 📣';
            $file=fopen("newticket_mail.html","r");
            $str=fread($file,filesize("newticket_mail.html"));
            $str=trim($str);
            fclose($file);
            $mail->Body    = $str;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}    
?>