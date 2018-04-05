<?php
if($_SESSION["curuser"]!="Admin"){
    header("Location: http://dborndev.com/phpproject/blog.php");
}
