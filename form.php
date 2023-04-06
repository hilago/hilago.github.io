<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Validate input fields
    if (strlen($name) < 2) {
        die('Name must be at least 2 characters long.');
    }

    if (!preg_match('/^\d{10}$/', $phone)) {
        die('Invalid phone number.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email address.');
    }

    // Compose email message
    $to = 'drushimash@gmail.com';
    $subject = 'New lead from website';
    $message = "Name: $name\nPhone: $phone\nEmail: $email";

    // Send email
    if (mail($to, $subject, $message)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>