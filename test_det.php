<?php require_once 'header.php'; ?>
<?php
$query = "select * from test_list where id = $_REQUEST[id] ";
$r = run_sql($query);
if($row =  mysql_fetch_array($r)){
    if(is_admin()){
        $ans = $ans ."<p><a href='test_del.php?id=$row[id]'>Delete</a></p>"; 
    }
?>
<h1><?php echo $row["t_name"]?></h1>
<table border="1"  style="width: 60%; border-collapse:collapse;">
    <tr>
        <td width="20%" >Category</td>
        <td width="80%" ><?php echo $row["t_cate"]?></td>
    </tr>           
    <tr>
        <td width="20%" >Description</td>
        <td width="80%" ><?php echo $row["t_desc"]?></td>
    </tr>           
    <tr>
        <td width="20%" >Price</td>
        <td width="80%" ><?php echo $row["price"]?></td>
    </tr>           
    <?php
}
    ?>
    <tr><td colspan="2"><a href="index.php">Back</a></td></tr>    
</table>
</br>
</br>
<?php require_once 'footer.php'; ?>