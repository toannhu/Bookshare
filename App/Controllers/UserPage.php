<?php

require './Database.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdf_online";

if ($_SESSION['user_id']) {
    $id = $_SESSION['user_id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    echo json_encode($row);

    $conn->close();
}

?> 