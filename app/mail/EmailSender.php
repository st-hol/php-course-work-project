<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 26/05/19
 * Time: 18:55
 */

class EmailSender
{

    public function notifyStudentByEmail($enrolled, $user_email)
    {
        $message = "<h3> Результат подачі заяви на вступ" . "</h3>";

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

        if ($enrolled == true) {
            $result_message = "Вітаємо! Ви зараховані.";
        } else {
            $result_message = "На жаль ви не пройшли відбір...";
        }

        $message = $message . "<br>" . $result_message;

        if (mail($user_email, 'результат відбору', $message, $headers)) {
            echo "<br><script>alert('check your email! result was send');</script>";
        } else {
            //echo "<br><script>alert('error occurred while sending email');</script>";
        }
    }
}

//$e = new EmailSender();
//$e->notifyStudentByEmail(true, "sdaf12fds21@gmail.com");