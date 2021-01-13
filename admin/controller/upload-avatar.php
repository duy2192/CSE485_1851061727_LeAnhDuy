<?php
require( '/xampp/htdocs/CSE485_1851061727_LeAnhDuy/config.php');
if ( !empty($_FILES['file'])) {
  $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
  $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
 $filename= rand(0, 1000).$_FILES['file']['name'];
  if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
    $sql="select avatar from about_me ";
    $result=mysqli_fetch_array(mysqli_query($conn,$sql));
      if (move_uploaded_file($_FILES['file']['tmp_name'], 'D:/xampp/htdocs/CSE485_1851061727_LeAnhDuy/images/home/' . $filename)) {
        //   unlink("D:/xampp/htdocs/CSE485_1851061727_LeAnhDuy/$result[0]");  
          $sql1="Update about_me set avatar='images/home/$filename'";
          if (mysqli_query($conn,$sql1)) {
            die("images/home/$filename"); 
          }
      } else { 
          die('Error!'); 
      }
  } else { 
      die('Only image!'); 
  }
} else {
  die('Lock'); 
}