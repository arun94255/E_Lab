<?php require_once 'header.php'; ?>
<h1>E-LAB Tests</h1>
<?php
$msg = "";
$whr ="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg = "Submited!!";
    }
    else if($_REQUEST["msg"]==2){
        $msg = "Deleted!!";
    }
}
if(!empty($_REQUEST["si"])){
    $whr = " and user_name like '%$_REQUEST[si]%' ";
}
if(is_admin()==false){
    $whr = $whr . " and id = '$_SESSION[id]' ";
}

$query = "select * from app_users where not role ='admin' $whr order by id desc ";
$r = run_sql($query);
?>
<?php
echo "<h3>$msg</h3>";
?>
<table width="60%">
   <tr><td> 
<form>
    <input <?php echo "value = '$_REQUEST[si]'";?> style="width: 53%;" type="text" name="si"/> 
    <input type="submit" value="search"/>
</form>
      </td></tr>
   <tr><td>
<table border="1"  style="width: 100%; border-collapse:collapse;">
    <tr>
        <td width="40%">User Name</td>
        <td width="40%">Test Name</td>
        <td width="20%">Status</td>
    </tr>   
    <?php
    while($row=  mysql_fetch_array($r)){
        if(strlen($row[t_name])>60)
        {
        $t_name = substr($row[t_name], 0, 55) . ".....";            
        }
        else {
        $t_name = $row[t_name];                        
        }
        if(file_exists("upload/$row[id].jpg")){
            $status = "Done!";
        }
        else {
            $status = "Pending!";            
        }
        echo "<tr>
        <td><a href='tres_det.php?id=$row[id]'>$row[user_name]</a></td>
        <td>$t_name</td>
        <td>$status</td>
    </tr>";
    }
    ?>
        
</table>
           </td></tr></table>
</br>
</br>
<?php require_once 'footer.php'; ?>