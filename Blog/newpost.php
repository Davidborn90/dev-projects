<?php 
require"config.php";
require"checklog.php";
echo"<div class='wrapper'>";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_SESSION["curid"];
    $postname=$_POST["postname"];
    $postcontent=$_POST["postcontent"];
    $postdate = date('Y-m-d');
    $postid=rand(100000,999999);

    $query="INSERT INTO posts(ID, POSTNAME, POSTCONTENT, POSTDATE, POSTID) VALUES('$id','$postname','$postcontent','$postdate','$postid')";
    if($conn->query($query)){
        echo"Post Succeeded!";
    }else{
        echo"There was an error<br><br> Try shorter values or refer to this error code: <br>".$conn->errno.": ".$conn->error;
        echo"<br><br>".$query."<br>";
    }
}
?>
<form method="post">
    <input type="text" name="postname" required="true" placeholder="Postname"> *Max 50 characters<br>
    <textarea name="postcontent" required="true" rows="8" cols="32" placeholder="Post Content" > </textarea>*Max 500 characters<br>
    <input type="submit" name="submit" value="Submit">
</form>
</div>
<?php
require "foot.html";