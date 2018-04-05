<?php
require"config.php";
require"checkadmin.php";
require"checklog.php";


$query="SELECT usrname, usrpass, id from login";

$result=$conn->query($query);

if($result-> num_rows > 0){
    ?><form method='get'>
    <table border="1">
        <tr>
            <td><strong>Naam</strong></td><td><strong>Wachtwoord</strong></td><td><strong>ID</strong></td>
        </tr>
    <?php
    while($row=$result->fetch_assoc()){
        $curid = $row["id"];
        $curname = $row["usrname"];
        echo"<tr><td>".$curname."</td><td>".$row["usrpass"]."</td><td>".$curid."</td><td><button type='submit' formaction='delete.php' name='usrid' value='".$curid."'>Verwijder Gebruiker</button></td><td><button type='submit' name='usrid' formaction='edit.php' value='".$curid."'>Pas gebruiker aan</button><input type='hidden' name='usrname' value='".$curname."'></td></tr>";
    }

}else{
    echo"No results found";
}
    if(isset($msg)&&$msg=="success") {
        echo "met success verwijderd";
    }else{"Er is een Error";}
?>
    </table>
</form>
<br>
<br>
<a href="insert.php">Maak nieuw aan</a>
<?php
require"foot.html";