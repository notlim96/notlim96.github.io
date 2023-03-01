<?php 


// requerimos las dos libreiras qu vamos utlizar.
require("class.pop3.php");
require("class.phpmailer.php");
require("class.smtp.php");

 

class emailModelo{

    /*--------- modelo abrir  ticket -------*/
    public function email_milton(){

        $email = $_POST['milton_email_reg'];
        $tema = $_POST['milton_tema_reg'];
        $mensaje = $_POST['milton_mensaje_reg'];

        $cliente = 'MILTON HUARACC PALOMINO';

        // coreo y clave del que envia el correo ...............
        $email_user = 'miltonolmedo9612@gmail.com';
        $email_password = 'rmjcsubfpobthvez';

        $the_subject = "Mensaje recibido de -  Ing. Milton Huaracc Palomino"; // asuto del EMAIL, peosnalizar

        $address_to = "ingsistemasmilton@gmail.com" ; 

        $from_name = 'Asesosria de tramites en linea';

        /* ****************    PARTE PARA EVNIAR DATOS DEL CPRREO **************************+*******/
        $phpmailer = new PHPMailer();

        $phpmailer->Username = $email_user;

        $phpmailer->Password = $email_password;

        $phpmailer->SMTPSecure = 'tls';  // ssl - tls 

        $phpmailer->Host = 'smtp.gmail.com';

        $phpmailer->Port = 587; // 587 - 465

        $phpmailer->isSMTP(); 

        $phpmailer->SMTPAuth = true;

        $phpmailer->setFrom($phpmailer->Username,$from_name);

        $phpmailer->AddAddress($address_to); 
        $phpmailer->AddAddress("Brisethb28@gmail.com"); 
        $phpmailer->AddAddress("Mariaalmora9@gmail.com"); 
        $phpmailer->AddAddress("mirianflorescarbajal@gmail.com"); 
        $phpmailer->AddAddress("ingsistemasmilton@gmail.com"); 

        $phpmailer->FromName = 'MILTON DEV';   // nombre de la empr3sa o orginzaion que envia el email.

        $phpmailer->Subject = $the_subject;


        $phpmailer->IsHTML(true);

        $cuerpo = file_get_contents('../contenido/mail_creado.html');

        // prametros que vamos a reamplzar en el template.
        $cuerpo = str_ireplace("email_datos_cliente",$tema,$cuerpo);
        $cuerpo = str_ireplace("email_dato_cliente",$email,$cuerpo);

        $phpmailer->Body = $cuerpo;
        $phpmailer->AltBody = strip_tags("Correo Recibido");

        // validamos pat verificar
        if(!$phpmailer->Send()) {
            return 'Error del Mailer: ' . $phpmailer->ErrorInfo;
            exit();
        }else{
            return 1;
        }

    }
}