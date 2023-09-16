<?php

namespace Secureaks\VulnerableComponents\Services;

use PHPMailer;
use phpmailerException;

class Contact
{

    public function send(string $name, string $email, string $message): bool
    {
        $mail = new PHPMailer();

        try {
            $mail->Host = "localhost";
            $mail->setFrom($email, 'Vulnerable Server');
            $mail->addAddress('admin@vulnerable.com', 'Hacker');
            $mail->Subject = "Message from $name";
            $mail->Body = $message;
            $mail->send();
            return true;
        } catch (PhpMailerException $e) {
            return false;
        }
    }
}