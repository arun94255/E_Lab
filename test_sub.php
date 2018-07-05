<?php require_once 'header.php'; ?>
<?php
check_admin();
$err="";
if(isset($_POST["tname"])){
    if(empty ($_POST["tname"])){
        $err= "Test name is required!";
    }
    else if(empty ($_POST["tcat"])){
        $err= "Category is required!";        
    }
    else if(empty ($_POST["desc"])){
        $err= "Description is required!";        
    }
    else if(empty ($_POST["price"])){
        $err= "Price is required!";        
    }
    else if(is_numeric ($_POST["price"])==false){
        $err= "Price is incorrect!";        
    }
    else {
    $query = "INSERT INTO `test_list` 
    (`t_name`, `t_cate`, `t_desc`, `price`) 
    VALUES ('$_POST[tname]', '$_POST[tcat]', '$_POST[desc]', 
        '$_POST[price]');";
    $r = run_sql($query);
    redirect("index.php?msg=1");
    }
}
?>
<h1>Add Test</h1>
<form method="post">
<table>
    <tr>
        <td>Test Name</td> 
        <td><input style="width: 300px;" type="text" value="<?php echo "$_POST[tname]"?>" name="tname"/>*</td> 
    </tr>
    <tr>
        <td>Category</td> 
        <td><input style="width: 300px;" type="text" value="<?php echo "$_POST[tcat]"?>" name="tcat"/>*</td> 
    </tr>
    <tr>
        <td>Description</td> 
        <td>
            <textarea style="width: 300px;"  name="desc" rows="5"><?php echo "$_POST[desc]"?></textarea>
        </td> 
    </tr>
    <tr>
        <td>Price</td> 
        <td><input style="width: 300px;" type="text" value="<?php echo "$_POST[price]"?>" name="price"/>*</td> 
    </tr>
    <tr>
        <td colspan="2"><?php echo $err; ?></td> 
    </tr>
    <tr>
        <td><input type="submit" value="Add"/></td> 
        <td><input type="reset" /></td> 
    </tr>
</table>
</form>
<?php require_once 'footer.php'; ?>