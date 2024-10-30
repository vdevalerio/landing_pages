<?php
require_once '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = $contactUs['control']['destiny'];
        $subject = $contactUs['control']['subject'];

        $email_message = "
        {$contactUs['form']['fields']['name']['label']}: $name\n
        {$contactUs['form']['fields']['email']['label']}: $email\n
        {$contactUs['form']['fields']['message']['label']}: $message\n
        ";

        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $email_message, $headers)) {
            header("Location: /index.php");
            exit();
        }
    } else {
        echo $contactUs['control']['errorMessage'];
    }
}
?>