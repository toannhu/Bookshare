<?php
  require 'Database.php';

  if (isset($_SESSION['user_id'])) {
    $id = $_SESSION["user_id"];
      $records = mysqli_query($dbhandle, "SELECT username FROM users WHERE id=$id");
      while ($row = mysqli_fetch_array($records)) {
        echo json_encode($row);
      }
        
    }
?>