<?php
if(!isset($_SESSION["curuser"])||$_SESSION["curuser"]==""){
    header("location: login.html");
}
else {
    require"head.html";
    echo "You are logged in as: " . $_SESSION["curuser"] . " <br><small> User-ID: " . $_SESSION["curid"]."</small><br><br>";
    echo "<br><a href='blog.php'>Blog</a> | <a href='logout.php'> Log Out</a>";
    if($_SESSION["curuser"]=="Admin") {
    echo " | <a href='index.php'> Admin Page</a><br><br>";
}
}
echo "</div><div class='wrapper'>";

