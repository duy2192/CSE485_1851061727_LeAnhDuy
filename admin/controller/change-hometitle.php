<?php
require( '/xampp/htdocs/CSE485_1851061727_LeAnhDuy/config.php');
if(isset($_POST['change'])){
    $txt1=$_POST['home-txt1'];
    $txt2=$_POST['home-txt2'];
    if(!empty($txt1) && !empty($txt2)){
        $sql="Update about_me set home_title1='$txt1', home_title2='$txt2'";
        if(mysqli_query($conn,$sql)){
            die('Saved!');
        }
        else{
            die('Error!');
        }
    }
}
?>