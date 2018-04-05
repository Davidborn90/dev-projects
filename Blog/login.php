<?php

require"config.php";
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $usernameinput = $_POST["usernameinput"];
    $passwordinput = $_POST["passwordinput"];

    $query = "SELECT usrname,usrpass, id FROM login WHERE usrname='$usernameinput' AND usrpass='$passwordinput'";

    $result = $conn->query($query);

    if($result->num_rows==1){
        $value= mysqli_fetch_object($result);
        $curid= $value->id;
        $_SESSION['curuser'] = $usernameinput;
        $_SESSION['curid'] = $curid;
        header("location: blog.php");
    } else {
        header("location: login.php");
    }
}
