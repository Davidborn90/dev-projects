<?php
require"config.php";
$idinput=$_GET["usrid"];
$postinput = $_GET["deletepost"];
$query="DELETE FROM posts WHERE POSTNAME='$postinput'";

if($conn->query($query)==TRUE){
    $msg="success";
    header('Location: blog.php');
}
else{
    $msg="error";
    header('Location: blog.php');
}
