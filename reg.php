<?php require_once 'header.php'; ?>
<?php
check_admin();
$err="";
if(isset($_POST["uname"])){
    if(!check_cambo($_POST["t_name"])){
        $err= "Test Name is required!";
    }
    else if(empty ($_POST["uname"])){
        $err= "User name is required!";
    }
    else if(empty ($_POST["email"])==false && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false){
        $err= "E Mail is incorrect!";        
    }    
    else if(empty ($_POST["pn"])==false && 
            preg_match("/^0?[7-9]{1}\d{9}$/", $_POST["pn"])==false){
        $err= "Phone no is incorrect!!";        
    }    
    else {  
    $pass = rand(10000, 20000);    
    $query = "INSERT INTO `app_users` 
    (`user_name`, `email`, `pass`, `role`, `status`, phone_no, t_name) 
    VALUES ('$_POST[uname]', '$_POST[email]', '$pass', 
         'patient', 'approved', '$_POST[pn]', '$_POST[t_name]');";
    $r = run_sql($query);
    $lid = mysql_insert_id();
    echo "<h3>Your id is :: $lid </h3>";
    echo "<h3>Your password is :: $pass </h3>";
    echo "<h3><a href='reg.php'>back</a></h3>";    
    return;
    }
}
?>
<h1>Register Patient</h1>
<form method="post">
<table>
    <tr>
        <td>Test Name</td> 
        <td>
                <select name="t_name" style="width: 140px">
                    <option>Select</option>
                    <?php
                    $r = run_sql("select * from test_list order by t_name");
                    while($row = mysql_fetch_array($r)){
                        $sel="";
                        if($_REQUEST["t_name"]==$row[t_name])
                        {
                           $sel=" selected='selected'"; 
                        }
                        echo "<option $sel>$row[t_name]</option>";
                    }
                    ?>
                </select>
        </td> 
    </tr>
    <tr>
        <td>Name</td> 
        <td><input type="text" value="<?php echo "$_POST[uname]"?>" name="uname"/>*</td> 
    </tr>
    <tr>
        <td>E Mail</td> 
        <td><input type="text" value="<?php echo "$_POST[email]"?>" name="email"/>*</td> 
    </tr>
    <tr>
        <td>Phone No</td> 
        <td><input type="text" value="<?php echo "$_POST[pn]"?>" name="pn"/></td> 
    </tr>
    <tr>
        <td colspan="2"><?php echo $err; ?></td> 
    </tr>
    <tr>
        <td><input type="submit" value="Register"/></td> 
        <td><input type="reset" /></td> 
    </tr>
</table>
</form>
<?php require_once 'footer.php'; ?>