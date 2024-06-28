<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name || !$email || !$message) {
            header('Location: contact.php?status=error');
            exit();
        }

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host         = 'smtp.gmail.com';
            $mail->SMTPAuth     = true;
            $mail->Username     = 'michtobbacaresinc@gmail.com';
            $mail->Password     = 'ioly usfk ksqh ysfv';
            $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port         = 465;

            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('michtobbacaresinc@gmail.com', 'MTC Templates');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'MTC Templates Feedback Form Submission from ' . $name;
            $mail->Body    = "<p>Name: $name</p><p>Email: $email</p><p>Message: $message</p>";

            $mail->send();
            header('Location: feedback.php?status=success');
        } catch (Exception $e) {
            header('Location: feedback.php?status=error');
        }
    }
