<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if (isset($_POST['name']) && isset($_POST['ratio'])) {
    $name = $_POST['name'];
    $ratio = $_POST['ratio'];
    if (!empty($name) && !empty($ratio)) {
        $sql = "Insert into work_skills(name,skill)  values ('$name','$ratio')";
        if (mysqli_query($conn, $sql)) {
            $sql="Select max(id) from services";
            $id=mysqli_fetch_array(mysqli_query($conn,$sql));
            die($sql);
        } else {
            die($sql);
        }
    }
    else{
        die($sql);
    }
}
