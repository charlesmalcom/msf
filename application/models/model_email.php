<?php

class Model_email extends CI_Model{

    function emailSend(){
        $to      = 'charles.malcom.jr@gmail.com';
        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: info@mysimplefinances.com' . "\r\n" .
            'Reply-To: info@mysimplefinances.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        //mail($to, $subject, $message, $headers);
        //send_email('recipient', 'subject', 'message')
        send_email($to, $subject, $message);
    }

    function emailConfirm($email){
        if (valid_email($email)) { return '1'; }
        else { return '0'; }

    }

}
