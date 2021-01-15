<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (!empty($title) && !empty($content)) {
        $sql = "Insert into services  values (null,'$title','$content')";
        if (mysqli_query($conn, $sql)) {
            $sql="Select max(id) from services";
            $id=mysqli_fetch_array(mysqli_query($conn,$sql));
            die("$id[0]");
        } else {
            die('0');
        }
    }
    else{
        die('2');
    }
}
