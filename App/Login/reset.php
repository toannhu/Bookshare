<?php
session_start();

if (isset($_SESSION['user_id'])) {
    session_destroy();
    session_start();
}

require 'database.php';
require 'sendMail.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['username']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789!@#$%^&*()');
    shuffle($seed);
    $randPass = '';
    foreach (array_rand($seed, 8) as $k)
        $randPass .= $seed[$k];

    $sql = "UPDATE users SET password = :new_password WHERE username = :username AND email = :email";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $_POST['username']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':new_password', password_hash($randPass, PASSWORD_BCRYPT));
    
    $mail = new MailSender();
    $mail->sendMail($_POST['email'], 'Reset Password', 'Your new password is ' .$randPass);

    if ($stmt->execute())
        $message = 'Successfully reset password';
    else
        $message = 'Sorry there must have been an issue reset your account';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register Below</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="header">
            <a href="/">Your App Name</a>
        </div>

        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <h1>Reset Password</h1>

        <form action="reset.php" method="POST">

            <input type="text" placeholder="Enter your username" name="username">
            <input type="text" placeholder="Enter your email" name="email">
            <input type="submit" value="Submit">

        </form>

    </body>
</html>