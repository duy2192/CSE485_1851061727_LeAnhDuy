<?php
require( '/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if(isset($_POST['name']) || isset($_POST['aboutme'])){
    $name=$_POST['name'];
    $text=$_POST['aboutme'];
    // $birthday=$_POST['day'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $language=$_POST['language'];
    $sql="Update about_me set name='$name', about_me='$text',phone='$phone',email='$email',language='$language' ";
    if(mysqli_query($conn,$sql)){
        die('1');
    }
    else
    {
        die($sql);
    }

}