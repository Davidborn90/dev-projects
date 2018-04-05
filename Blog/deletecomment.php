<?php
require"config.php";
$postinput = $_GET["deletecomment"];
$query="DELETE FROM comments WHERE COMID='$postinput'";

if($conn->query($query)==TRUE){
    $msg="success";
    header('Location: blog.php');
}
else{
    $msg="error";
    header('Location: blog.php');
}
