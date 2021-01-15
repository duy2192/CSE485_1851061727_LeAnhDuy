<?php
require('/xampp/htdocs/CSE485_1851061727_LeAnhDuy/databases/config.php');
if(isset($_POST['title'])){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $time=$_POST['time'];
    if(!empty($title)&&!empty($content)&&!empty($time)){
        $sql="Insert into education(title,content,time) values ('$title','$content','$time')";
        if(mysqli_query($conn,$sql))
        {
            $sql="select max(id) from education ";
            $id=mysqli_fetch_array(mysqli_query($conn,$sql));

            die("$id");
        }
        else{
            die('0');
        }
    }else{
        die('2');
    }
}
?>
