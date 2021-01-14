<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "Delete from services where id='$id'";
    if (mysqli_query($conn, $sql)) {
        die('1');
    } else {
        die('0');
    }
}
