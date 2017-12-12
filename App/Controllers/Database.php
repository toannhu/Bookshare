<?php
  session_start();

  $username = 'root';
  $password = '';
  $hostname = "localhost";

  $dbhandle = mysqli_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
  $selected = mysqli_select_db($dbhandle, "pdf_online") or die("Could not select examples");
?>