<?php
  
  require './Database.php';

  if (isset($_POST['genre'])) {
    $genre = $_POST['genre'];
    
    $getBooks = mysqli_query($dbhandle, "SELECT * from books where genre like '%$genre%'");
    $books = array();
    while ($row = mysqli_fetch_array($getBooks)) {
      $books[] = $row;
    }
    echo json_encode($books);
  } else if (isset($_POST['action'])) {
    $getGenres = mysqli_query($dbhandle, "SELECT * FROM genres");
    
    $res = array();
    $i = 0;
    while ($row = mysqli_fetch_array($getGenres)) {
      $res[] = $row;
      $i++;
    }
    
    echo json_encode($res);
  }
?>