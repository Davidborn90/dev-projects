<?php
require"config.php";
$idinput=$_GET["usrid"];
$query="DELETE FROM login WHERE id='$idinput'";

if($conn->query($query)==TRUE){
    $msg="success";
    header('Location: index.php');
}
else{
    $msg="error";
    header('Location: index.php');
}
