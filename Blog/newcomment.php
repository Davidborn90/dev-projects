<?php
require"config.php";
$id=$_SESSION["curid"];
$commentid=rand(10000, 99999);
$postid=$_POST["postid"];
$commentcontent=$_POST["commentinput"];

$query="INSERT INTO comments(ID, POSTID, COM_CONTENT,COMID) VALUES('$id','$postid','$commentcontent','$commentid')";
if($conn->query($query)){
header("location: blog.php");
}else{
echo"There was an error<br><br> Try shorter values or refer to this error code: <br>".$conn->errno.": ".$conn->error;
echo"<br><br>".$query."<br>";
}
?>