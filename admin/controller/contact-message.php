<?php
require( '/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if(isset($_POST['ctemail'])){
    $name=$_POST['ctname'];
    $email=$_POST['ctemail'];
    $comment=$_POST['ctcomment'];
    $sql="Insert into message(name,email,content) values ('$name','$email','$comment')";
    if(mysqli_query($conn,$sql)){
        die('1');
    }
    else{
        die('0');
    }
}

?>