<?php
require"config.php";
require"head.html";


if((isset($_POST["submit"]))&&($_POST["usernameinp"]!="")&&($_POST["userpassinp"]!="")){
    $nameinput=$_POST["usernameinp"];
    $query="SELECT usrname FROM login WHERE usrname='$nameinput'";
    $result=$conn->query($query);
    if($result->num_rows==0){
        $passinput=$_POST["userpassinp"];
        $idinput = rand(1, 9999);
        $query="INSERT into login(usrname, usrpass, id)VALUES('$nameinput','$passinput','$idinput')";
        if($conn->query($query)==TRUE){
            echo"You have been registered!";
        }else{
            echo"Registration failed. Try shorter values.";
        }
    }
    else{
        echo"The username is already taken. Please try something different.";
    }
}


?>
<h1>Sign up</h1><br><br>
</div>
<div class="wrapper">
<form method="post" action="insert.php">
    <input type="text" name="usernameinp" required="true" placeholder="name">
    <input type="password" name="userpassinp" required="true" placeholder="pass">
    <input type="submit" name="submit" placeholder="Sign Up">
</form>
<br><p>
    <?php
        if($_SESSION["curuser"]!="Admin"){
            echo"<a href='login.html'>Back to login screen</a>";
        }
    else{
        echo"<a href='index.php'>Back to Admin screen</a>";
    }
    ?>
</p></div>
<?php
require"foot.html";
