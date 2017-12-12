<?php
  
  require './Database.php';

  if (isset($_POST['bookid'])) {
    $bookid = $_POST['bookid'];
    if (isset($_POST['action'])) {
      $getComments = mysqli_query($dbhandle, "SELECT * from comments where idbook=$bookid");
      $comments = array();
      while ($row = mysqli_fetch_array($getComments)) {
        $comments[] = $row;
      }
      echo json_encode($comments);
    } else {
      $getBooks = mysqli_query($dbhandle, "SELECT * from books where id=$bookid");
      $book = array();
      while ($row = mysqli_fetch_array($getBooks)) {
        $book[] = $row;
      }
      echo json_encode($book);
    }
  }
?>