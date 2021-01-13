<?php
require( '/xampp/htdocs/CSE485_1851061727_LeAnhDuy/config.php');
    $field = $_POST['field'];
   $value = $_POST['value'];
   $id = $_POST['id'];
   $query = "UPDATE services SET $field='$value' WHERE id='$id'";
   
   if(mysqli_query($conn,$query)){
        die('1');
   }
