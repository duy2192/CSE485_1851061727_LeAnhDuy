<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id=$_POST['id'];
    if (!empty($title) && !empty($content)) {
        $sql = "Update projects  set title='$title',content='$content' where id='$id'";
        if (mysqli_query($conn, $sql)) {
            $sql="Select image from projects where id='$id'";
            $image=mysqli_fetch_array(mysqli_query($conn,$sql));
            die("$image[0]");
        } else {
            die('0');
        }
    }
    else{
        die('2');
    }
}