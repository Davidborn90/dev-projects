<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="addorg.php">Add Organisation</a> | <a href="adduser.php">Add User</a>
</body>
<?php
require "config.php";
//prepare and execute query
$query="select org_name, org_kvk, org_address, org_id from org";

$result = $conn->query($query);

//check if there are more then 0 rows to display. if not it shows a "No entries found exception"
if($result -> num_rows>0 ){
    echo "<form method='get'><table class='table'><tr><td><b>Organisation</b></td><td><b>KVK</b></td><td><b>Address</b></td></tr>";


    //execute a loop for as long as there are rows within the result
    while($rows=$result->fetch_assoc()){

        //echo the items
        echo"<tr><td>".$rows["org_name"]."</td><td>".$rows["org_kvk"]."</td><td>".$rows["org_address"]."</td><td><button formaction='organisations.php' name='orgid' value='".$rows["org_id"]."'>Select</button></td></tr>";
    }
    echo"</table></form>";
}
else{
    echo"No entries found";
}
/*the same result is repeated below. the only difference is that an item must be selected before its able to display anything*/

echo"<br><br>";

if(isset($_GET["orgid"])){
    $orgid=$_GET["orgid"];
    $userquery="select user_id, user_name, user_pass, user_email, user_role from user where org_id='$orgid'";
    $usersresult= $conn->query($userquery);

    if($usersresult ->num_rows>0){
        echo"<form method='post'><table class='table'><tr><td> </td><td><b>User ID</b></td><td><b>User name</b></td><td><b>User Password</b></td><td><b>User Email</b></td><td><b>User role</b></td></tr>";
        while($userrows=$usersresult->fetch_assoc()){
            echo"<tr><td><input type='checkbox' name='selectusers[]' value='".$userrows["user_id"]."'></checkbox></td><td>".$userrows["user_id"]."</td><td>".$userrows["user_name"]."</td><td>".$userrows["user_pass"]."</td><td>".$userrows["user_email"]."</td><td>".$userrows["user_role"]."</td></tr>";
        }
        echo"</table><button formaction='delete.php'>Delete Users</button></form>";
    }
    else{
        echo"No users found";
    }
}
else{
    echo"No organisation selected";
}
