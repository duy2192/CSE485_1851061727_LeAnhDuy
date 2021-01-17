<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if (!empty($_FILES['file'])) {
    $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
    $filename = rand(0, 1000) . $_FILES['file']['name'];
    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
        if (move_uploaded_file($_FILES['file']['tmp_name'], 'D:/xampp/htdocs/CSE485_1851061727_LeAnhDuy/images/projects/' . $filename)) {
            $sql = "Insert into projects(image) values ('images/projects/$filename')";
            if (mysqli_query($conn, $sql)) {
                $sql = "select id from projects where image='images/projects/$filename'";
                $result=mysqli_fetch_array(mysqli_query($conn,$sql));
                die($result[0]);
            } else {
                die('Error!');
            }
        }
        else{
            die('Error!');
        }
    } else {
        die('Error!');
    }
} else {
    die('Error!');
}
