<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = 'smtp-relay.sendinblue.com';
         $mail->SMTPAuth = true;
         $mail->Port = 587;
         $mail->Username = 'di34nd@gmail.com';
         $mail->Password = 'xsmtpsib-382ecbf98521e1203d5baa45639d220bfa515320aaf7e04a644e3af16202f8fc-sHPv2nNbS6aM9Lqr';
     
         $mail->setFrom('cuentas@appsalon.com');
        //  $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
         $mail->addAddress($this->email);
         $mail->Subject = 'Confirma tu Cuenta';

         // Set HTML  
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';
         //Seteamos estas instrucciones para indicar que vamos a usar html en el body del correo.

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Creado tu cuenta en App Salón, solo debes confirmarla presionando el siguiente enlace</p>";
         $contenido .= "<p>Presiona aquí: <a href='https://proyappsalon.alwaysdata.net/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
         $contenido .= "<p>Si no solicitaste este cambio, puedes ignorar el mensaje</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();

    }

    public function enviarInstrucciones() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'di34nd@gmail.com';
        $mail->Password = 'xsmtpsib-382ecbf98521e1203d5baa45639d220bfa515320aaf7e04a644e3af16202f8fc-sHPv2nNbS6aM9Lqr';
    
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://proyappsalon.alwaysdata.net/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

            //Enviar el mail
        $mail->send();
    }
}