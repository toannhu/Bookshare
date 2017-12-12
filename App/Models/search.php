<?php
    require 'database.php';
    
    if (!empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $sql = "SELECT * FROM books WHERE title LIKE '%$keyword%'";
        $res = $conn->query($sql);
        $jsonObj = array();
        if ($res->rowCount() > 0) {
            foreach ($res as $row) {
                $arr = array('id' => $row['id'], 'title' => $row['title'], 'image' => $row['image'], 'author' => $row['author']);
                array_push($jsonObj, $arr);
            }
            echo json_encode($jsonObj);
        }
    }
?>