<?php
require "config.php";
if(isset($_POST["submit"])){


    $userid=rand(1,9999);
    $checkquery="select user_id from user where user_id='$userid'";
    $checkresult=$conn->query($checkquery);

    while($checkresult->num_rows>0){
        $userid=rand(1,9999);
        $checkquery="select user_id from user where user_id='$userid'";
        $checkresult=$conn->query($checkquery);
    }

        $username=$_POST["username"];
        $userpass=$_POST["userpass"];
        $useremail=$_POST["useremail"];
        $orgid=$_POST["orgid"];
        $insertquery="insert into user(user_id, user_name, user_pass, user_email, org_id)values('$userid','$username','$userpass','$useremail','$orgid')";

        if($conn->query($insertquery)){
            $msg = "A Credito account has been created!\nYour username is: ".$username.". with the password: ".$userpass.". \nPlease Contact your employer if this didnt happen on your behalf";

            $headers = "From: noreply@dborndev.com";
            // send email
            mail("$useremail","Credito account creation",$msg, $headers);

            header("Location: organisations.php");

        }
        else {
            echo "Failed to add user".$conn->error;


            echo "<br><br>" . $insertquery;
        }
}
else{
    $orglistquery="select org_id, org_name from org";
    $orglistresult=$conn->query($orglistquery);
    ?>
    <form method="post">
        <input type="text" placeholder="User name" name="username" required>
        <input type="password" placeholder="User password" name="userpass" required>
        <select name="orgid" required>
            <option value="">please select</option>
            <?php while($listorgs=$orglistresult->fetch_assoc()){
                echo"<option value='".$listorgs["org_id"]."'>".$listorgs["org_name"]."</option>";
            }
    ?>
        </select>
        <input type="text" placeholder="Email" name="useremail" required>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
}
