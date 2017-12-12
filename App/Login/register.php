<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /");
}

require 'database.php';
require 'sendMail.php';

$message = '';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fullname']) && !empty($_POST['phone_number']) && $_POST['password'] == $_POST['confirm_password'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):

    $sql = "INSERT INTO users(username, email, password, fullname, phone_number) VALUES (:username, :email, :password, :fullname, :phone_number)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
    $stmt->bindValue(':fullname', base64_encode($_POST['fullname']), PDO::PARAM_STR);
    $stmt->bindValue(':phone_number', $_POST['phone_number'], PDO::PARAM_STR);

    if ($stmt->execute()):
        $message = 'Successfully created new user';
        $mail = new MailSender();
        $mail->sendMail($_POST['email'], 'Welcome to PDF Online', 'Congratulations! You have successfully signed up!');
    else:
        $message = 'Sorry there must have been an issue creating your account';
    endif;

endif;
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

        <h1>Register</h1>
        <span>or <a href="login.php">login here</a></span>

        <form action="register.php" method="POST">
            <input type="text" placeholder="Enter your username" name="username">
            <input type="text" placeholder="Enter your email" name="email">
            <input type="password" placeholder="and password" name="password">
            <input type="password" placeholder="confirm password" name="confirm_password">
            <input type="text" placeholder="Your full name" name="fullname">
            <input type="text" placeholder="Your phone number" name="phone_number">
            <input type="submit" value="Sign Up">
        </form>

    </body>
</html>