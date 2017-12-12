<?php
  session_start();

  $username = 'root';
  $password = '';
  $hostname = "localhost";

  $dbhandle = mysqli_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
  $selected = mysqli_select_db($dbhandle, "pdf_online") or die("Could not select examples");

  if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'login') {
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      $role = login($dbhandle, $username, $password);

      if (intval($role)) {
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        echo $_SESSION['role'];
      }
    }
  }

  function login($dbhandle, $username, $password) {
    if ($result = mysqli_query($dbhandle, "SELECT role FROM users WHERE username='$username' and password='$password'")) {
      while ($row = mysqli_fetch_array($result)) {
        return $row[0];
      }
    } else return mysqli_error($dbhandle);
  }
?>