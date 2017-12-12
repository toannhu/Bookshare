<?php
  session_start();

  $username = 'root';
  $password = '';
  $hostname = "localhost";

  $dbhandle = mysqli_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
  $selected = mysqli_select_db($dbhandle, "pdf_online") or die("Could not select examples");

  $getUsers = mysqli_query($dbhandle, "SELECT * FROM users");
  $getBooks = mysqli_query($dbhandle, "SELECT * FROM books");
  $getComments = mysqli_query($dbhandle, "SELECT * FROM comments");

  if (isset($_POST['action'])) {
    if ($_POST['action'] == 'getData') {
      switch($_POST['type']) {
        case 'book': {
          while ($row = mysqli_fetch_array($getBooks)) {
            echo 
            '<tr>'.
              '<th scope="row" class="align-middle">'.$row[0].'</th>';
              for ($i = 1; $i <= 5; $i++) {
                echo '<td class="align-middle">'.$row[$i].'</td>';
              }
            echo
              '<td class="align-middle"><a href="'.$row[6].'" target="_blank"><img src="'.$row[7].'" class="img-thumbnail" alt="'.$row[1].'" style="width:100px;"></a></td>'.
              '<td class="align-middle">
              <button type="button" class="btn btn-primary" data-toggle="modal" 
                data-target="#editModal" 
                onclick="getEditData('.$row[0].')"
              >
                Edit
              </button></td>'.
              '<td class="align-middle"><button type="button" class="btn btn-danger" onclick="del(\'book\','.$row[0].')">Delete</button></td>'.
            '</tr>';
          }
          break;
        }
        case 'user': {
          while ($row = mysqli_fetch_array($getUsers)) {
            echo 
            '<tr>'.
              '<th scope="row" class="align-middle">'.$row[0].'</th>';
              for ($i = 1; $i <= 6; $i++) {
                echo '<td class="align-middle">'.$row[$i].'</td>';
              }
            echo
            '<td class="align-middle"><button type="button" class="btn btn-danger" onclick="del(\'user\','.$row[0].')">Delete</button></td>'.
            '</tr>';
          }
          break;
        }
        case 'comment': {
          while ($row = mysqli_fetch_array($getComments)) {
            echo 
            '<tr>'.
              '<th scope="row" class="align-middle">'.$row[0].'</th>';
              for ($i = 1; $i <= 4; $i++) {
                echo '<td class="align-middle">'.$row[$i].'</td>';
              }
            echo
            '<td class="align-middle"><button type="button" class="btn btn-danger" onclick="del(\'comment\','.$row[0].')">Delete</button></td>'.
            '</tr>';
          }
          break;
        }
        default: break;
      }
    } else if ($_POST['action'] == 'getEditData') {
      $id = $_POST['id'];
      $getEditBook = mysqli_query($dbhandle, "SELECT * FROM books WHERE id=$id");
      while ($row = mysqli_fetch_array($getEditBook)) {
        echo json_encode($row);
      }
    } else if ($_POST['action'] == 'del') {
      $id = $_POST['id'];

      switch($_POST['type']) {
        case 'book': {
          if (mysqli_query($dbhandle, "DELETE FROM books WHERE id=$id")) {
            echo 'Success: Deleted book id='.$id;
          } else {
            echo 'Error: '.mysqli_error($dbhandle);
          }
          break;
        }
        case 'user': {
          if (mysqli_query($dbhandle, "DELETE FROM users WHERE id=$id")) {
            echo 'Success: Deleted user id='.$id;
          } else {
            echo 'Error: '.mysqli_error($dbhandle);
          }
          break;
        }
        case 'comment': {
          if (mysqli_query($dbhandle, "DELETE FROM comments WHERE idcomment=$id")) {
            echo 'Success: Deleted comment id='.$id;
          } else {
            echo 'Error: '.mysqli_error($dbhandle);
          }
          break;
        }
        default: break;
      }
    } else if ($_POST['action'] == 'editBook') {
      $data = $_POST['data'];

      $id = $data[0];
      $title = $data[1];
      $author = $data[2];
      $genre = $data[3];
      $description = $data[4];
      $url = $data[5];
      $image = $data[6];

      if (mysqli_query($dbhandle, "UPDATE books SET title=\"$title\",author=\"$author\",genre=\"$genre\",description=\"$description\",url=\"$url\",image=\"$image\" WHERE id=$id")) {
        echo 'Success: Updated book '.$title;
      } else {
        echo 'Error: '.mysqli_error($dbhandle);
      }
    } else if ($_POST['action'] == 'addBook') {
      $data = $_POST['data'];

      $title = $data[0]["value"];
      $author = $data[1]["value"];
      $genre = $data[2]["value"];
      $description = $data[3]["value"];
      $url = $data[4]["value"];
      $image = $data[5]["value"];

      if (mysqli_query($dbhandle, "INSERT INTO books VALUES(null,\"$title\",\"$author\",\"$genre\",0,\"$description\",\"$url\",\"$image\")")) {
        echo 'Success: Inserted book '.$title;
      } else {
        echo 'Error: '.mysqli_error($dbhandle);
      }
    }
  }
?>