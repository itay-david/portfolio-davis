<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = 'itayd3104@gmail.com';

    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $msg = htmlspecialchars($_POST['msg']);

    if ($email) {
        $headers = 'From: ' . $email . "\r\n" .
                   'Reply-To: ' . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        $output = "Name: " . $name . "\n";
        $output .= "Email: " . $email . "\n";
        $output .= "Subject: " . $subject . "\n\n";
        $output .= "Message: " . $msg . "\n";

        if (mail($to, $subject, $output, $headers)) {
            echo 'Email sent successfully!';
        } else {
            echo 'Failed to send email.';
        }
    } else {
        echo 'Invalid email address.';
    }
} else {
    echo 'Invalid request method.';
}
?>
