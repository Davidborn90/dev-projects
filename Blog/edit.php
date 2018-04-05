<?php
require"config.php";
require"checklog.php";
$usrid=$_GET["usrid"];

$query = "SELECT usrname FROM login WHERE id='$usrid'";
$result=$conn->query($query);
$value= mysqli_fetch_object($result);
$username = $value->usrname;
echo"You are editing the user: ".$username." With the ID: ".$usrid;

if(isset($_POST["submit"])){
    $usrid=$_GET["usrid"];
    $usernameinput=$_POST["usrnameinput"];
    $userpassinput=$_POST["usrpassinput"];
    $query="UPDATE login SET usrname='$usernameinput', usrpass='$userpassinput' WHERE id='$usrid'";

    if($conn->query($query)==TRUE){
        echo "User Updated";
    }else{
        echo "There has been an error: <br><br>".$conn->error;
    }
}
?>

<br>
<form method="post">
    <input name="usrnameinput" value="<?php echo $username?>">
    <input name="usrpassinput" placeholder="pass">
    <input type="hidden" value="<?php echo $_GET["usrid"]?>">
    <input type="submit" value="verzenden" name="submit">
</form>
<br>
<br>
<a href="index.php">Terug naar overzicht</a>
