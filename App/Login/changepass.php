<?php
session_start();

require 'database.php';
require 'sendMail.php';

$message = '';

if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT * FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if (count($results) > 0) {
        $user = $results;
    } else $message = 'You have to login before change password!';

    if ($user != NULL) {
        if (!empty($_POST['new_password']) && !empty($_POST['confirm_password']) && $_POST['new_password'] == $_POST['confirm_password']) {
            $sql = "UPDATE users SET password = :new_password WHERE username = :username AND email = :email";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
            $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
            $stmt->bindValue(':new_password', $_POST['new_password'], PDO::PARAM_STR); //password_hash($_POST['new_password'], PASSWORD_BCRYPT));

            if ($stmt->execute()) {
                $message = 'Successfully changed password';
                $mail = new MailSender();
                $mail->sendMail($_POST['email'], 'Change password in PDF Online', 'Congratulations! You have successfully change your password! Your new password is ' . $_POST['new_password']);
            } else
                $message = 'Sorry there must have been an issue changing your account';
        }
    }
} else $message = 'You have to login before change password!';
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
            <a href="/">PDF Online</a>
        </div>

        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <h1>Change Password</h1>
        <span>or <a href="login.php">login here</a></span>

        <form action="changepass.php" method="POST">

            <input type="password" placeholder="New password" name="new_password">
            <input type="password" placeholder="Confirm password" name="confirm_password">
            <input type="submit" value="Submit">

        </form>

    </body>
</html>