<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "Delete from projects where id='$id'";
    $sql1 = "Select image from projects where id='$id'";
    $result=mysqli_fetch_array(mysqli_query($conn,$sql1));
    if (mysqli_query($conn, $sql)) {
        unlink("D:/xampp/htdocs/CSE485_1851061727_LeAnhDuy/$result[0]");  
        die('1');
    } else {
        die('0');
    }
}
