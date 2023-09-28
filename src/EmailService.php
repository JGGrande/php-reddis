<?php

namespace Unialfa; 

class EmailService {
    public function sendEmail($to, $subject, $message){
        echo"Enviado para: $to, Titulo: $subject, Mensagem: $message";
    }
}