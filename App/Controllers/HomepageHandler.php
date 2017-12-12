<?php
  require './Database.php';

  $getRecommendation = mysqli_query($dbhandle, "SELECT * FROM books ORDER BY RAND() LIMIT 8");
  $getCarouselBooks = mysqli_query($dbhandle, "SELECT * FROM books ORDER BY view DESC LIMIT 3");
  $getGenres = mysqli_query($dbhandle, "SELECT * FROM genres");

  if (isset($_POST['action'])) {
    if ($_POST['action'] == 'getRecommendation') {
      $res = array();
      $i = 0;
      while ($row = mysqli_fetch_array($getRecommendation)) {
        $res[] = $row;
        $i++;
      }
      
      echo json_encode($res);
    } else if ($_POST['action'] == 'getCarouselBooks') {
      $res = array();
      $i = 0;
      while ($row = mysqli_fetch_array($getCarouselBooks)) {
        $res[] = $row;
        $i++;
      }
      
      echo json_encode($res);
    } else if ($_POST['action'] == 'getGenres') {
      $res = array();
      $i = 0;
      while ($row = mysqli_fetch_array($getGenres)) {
        $res[] = $row;
        $i++;
      }
      
      echo json_encode($res);
    }
  }
?>