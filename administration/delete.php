<?php
require "config.php";


foreach($_POST["selectusers"] as $user){
    $query="DELETE FROM user where user_id='$user'";
    if ($conn->query($query)){
        header("Location: organisations.php");
    }
    else{
        echo $conn->error."<br>";
    }
}

//header("Location: organisations.php");