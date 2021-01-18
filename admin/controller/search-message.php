<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if(isset($_POST['search'])){
    $search=$_POST['search'];
    $option=$_POST['option'];
        $sql="Select * from message where name like '%$search%'";
        $result=mysqli_fetch_all(mysqli_query($conn,$sql));
        die($result);
}
?>