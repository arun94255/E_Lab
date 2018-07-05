<?php require_once 'header.php'; ?>
<h1>E-LAB Tests</h1>
<?php
$msg = "";
$whr ="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg = "Your test has been submited!!";
    }
    else if($_REQUEST["msg"]==2){
        $msg = "Your test has been deleted!!";
    }
}
if(!empty($_REQUEST["si"])){
    $whr = " where t_name like '%$_REQUEST[si]%' ";
}
$query = "select * from test_list $whr order by t_name ";
$r = run_sql($query);
?>
<?php
echo "<h3>$msg</h3>";
?>
<?php
if(is_admin()){
    echo "<a href='test_sub.php'>Add a test</a>";
}
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
        <td width="40%">Test Name</td>
        <td width="20%" >Category</td>
        <td width="20%">Price</td>
        <td width="20%">Action</td>
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
        $link ="";
        if(is_admin()){
            $link  = "<a href='test_del.php?id=$row[id]'>Delete</a>";
        }
        echo "<tr>
        <td><a href='test_det.php?id=$row[id]'>$t_name</a></td>
        <td>$row[t_cate]</td>
        <td>$row[price]</td>
        <td>$link</td>
    </tr>";
    }
    ?>
        
</table>
           </td></tr></table>
</br>
</br>
<?php require_once 'footer.php'; ?>