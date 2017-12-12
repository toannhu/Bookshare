<?php
session_start();

require 'database.php';
require 'sendMail.php';

//$mail = new MailSender();
//$mail->sendMail();

if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT id,email,fullname FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PDF Online</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="header">
            <a href="/">PDF Online</a>
        </div>

        <?php if (!empty($user)): ?>

            <br />Welcome <?= base64_decode($user['fullname']); ?> 
            <br /><br />Email <?= $user['email']; ?> 
            <br /><br />You are successfully logged in!
            <br /><br />
            <a href="logout.php">Logout?</a>

        <?php else: ?>

            <h1>Please Login or Register</h1>
            <a href="login.php">Login</a> or
            <a href="register.php">Register</a>

        <?php endif; ?>

    </body>
</html>