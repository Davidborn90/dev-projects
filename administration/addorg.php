<?php
require "config.php";
if(isset($_POST["submit"])){
    $orgid=rand(1,9999);
    $checkquery="select org_id from org where org_id='$orgid'";
    $checkresult=$conn->query($checkquery);
    if($checkresult->num_rows==0){
        $orgname=$_POST["orgname"];
        $orgkvk=$_POST["orgkvk"];
        $orglocation=$_POST["orgstreet"].", ".$_POST["orglocation"];
        $insertquery="insert into org (org_id, org_name, org_kvk, org_address)values('$orgid','$orgname','$orgkvk','$orglocation')";
        if($conn->query($insertquery)){
            echo"Success!";
        }
        else{
            echo "Failed to add record";
            $conn->error;
        }
    }
}
else{
    echo"
<form method='post'>
    <input type='text' placeholder='Organisation name' name='orgname' required>
    <input type='text' placeholder='KVK number' name='orgkvk' required>
    <input type='text' placeholder='Street name and number' name='orgstreet' required>
    <input type='text' placeholder='Location' name='orglocation' required>
    <input type='submit' name='submit' value='submit'>
</form>";

}
