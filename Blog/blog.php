<?php
require"config.php";
require"checklog.php";

$curuser=$_SESSION["curuser"];
$postquery="SELECT posts.*, login.usrname FROM posts AS posts INNER JOIN login as login ON (posts.id=login.id);";
$result=$conn->query($postquery);
?>
<br><br><h1>Blog</h1><br><br>
<a href="newpost.php">Add a new post</a><br><br>
<div class="wrapper">
<?php
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        //get post values
        $postname = $row["POSTNAME"];
        $postcontent = $row["POSTCONTENT"];
        $postdate = $row["POSTDATE"];
        $postuser = $row["usrname"];
        $postid = $row["POSTID"];

        //create post
        echo "<div class='post'><div class='postname'><h2>".$postname."</h2></div><br><br><div class='postcontent'><p>".$postcontent."</p></div><br><div class='postinfo'>Posted on: ".$postdate.". By: <b>".$postuser."</b> </div><br><br>";

        //check if post is viewed by OP or admin
        if($curuser==$postuser || $curuser=="Admin"){
        echo "<form method='get' action='deletepost.php'><button name='deletepost' value='".$postname."'>Delete post</button></form><br>";
        }

        //create comment form
        echo"<div class='postcomments'><form method='post' action='newcomment.php'><textarea rows='4' cols='32' name='commentinput' placeholder='Place comment(max 200 characters)'></textarea><input name='postid' type='hidden' value='".$postid."'><input type='submit' value='Post comment'></form>";

        //check for comments
        $commquery="SELECT comments.*, login.usrname FROM comments as comments INNER JOIN login as login ON (comments.id = login.id) WHERE POSTID='$postid'";
        $comresult=$conn->query($commquery);

        //fetch and create comments
        if($comresult->num_rows>0){
            while($comrow=$comresult->fetch_assoc()) {
                $comuser=$comrow["usrname"];
                $comcontent=$comrow["COM_CONTENT"];
                $comid=$comrow["COMID"];
                echo "<div class='comment'><div class='cominfo'><b>".$comrow["usrname"]."</b></div><div class='comcontent'>".$comrow["COM_CONTENT"]."</div>";
                if($curuser==$comuser || $curuser=="Admin"){
                    echo "<form method='get' action='deletecomment.php'><button name='deletecomment' value='".$comid."'>Delete Comment</button></form>";
                }
                echo"</div>";
            }
        }
        echo"</div></div>";
    }
}else{
    echo"No Posts found";
}
if(isset($msg)&&$msg=="success") {
    echo "met success verwijderd";
}
require "foot.html";
?>
</div>
