<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../Views/Homepage.html");
}

require 'database.php';

if (!empty($_POST['username']) && !empty($_POST['password'])):

    $records = $conn->prepare('SELECT id,email,password,role FROM users WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

        $_SESSION['user_id'] = $results['id'];
        
        if ($results['role'] == 3) {
            header("Location: ../admin/AdminPage.php");
        } else {
            header("Location:  ../Views/Homepage.html");
        }
        
    } else {
        $message = 'Sorry, those credentials do not match';
    }

endif;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Below</title>
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

        <h1>Login</h1>
        <span>or <a href="register.php">register here</a></span>

        <form action="login.php" method="POST">

            <input type="text" placeholder="Enter your username" name="username">
            <input type="password" placeholder="and password" name="password">

            <input type="submit" value="Login">

        </form>
        <a href="/Login/changepass.php" style="text-decoration:none">
            <input type="button" value="Change your password" />
        </a><br/>
        
        <a href="/Login/reset.php" style="text-decoration:none">
            <input type="button" value="Forget your password" />
        </a>

    </body>
</html>