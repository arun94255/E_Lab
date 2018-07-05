<?php require_once 'header.php'; ?>
<style>
    td{
        font-size: 16px;
        color: black;
border-style: solid; border-color: black; border-width: 1px;        
    }
    
</style>
                <h3>Test Result Details</h3>
                <?php                
                if(is_admin()){
                    if(isset($_FILES["at1"])){
                        if(check_img()!=null){
                            echo "<p>".check_img()."</p>";
                        }
                        else {
                              move_uploaded_file($_FILES["at1"]["tmp_name"], "upload/$_REQUEST[id].jpg");
                        }
                    }
                }
$query = "select * from app_users where  id = $_REQUEST[id]";
$r = run_sql($query);
if($row=  mysql_fetch_array($r)){
if(file_exists("upload/$row[id].jpg")){
            $status = "Done!";
        }
        else {
            $status = "Pending!";            
};    
echo "<table>
        <tr>
        <td  width='25%'>ID</td>
        <td >$row[id]</td>
        </tr>
        <tr>
        <td  width='25%'>User Name</td>
        <td >$row[user_name]</td>
        </tr>
        <tr>
        <td  width='25%'>Test Name</td>
        <td >$row[t_name]</td>
        </tr>
        <tr>
        <td  width='25%'>Status</td>
        <td >$status</td>
        </tr>
        <tr>
        <td  width='25%'>E-Mail</td>
        <td >$row[email]</td>
        </tr>
        <tr>
        <td  width='25%'>Phone No</td>
        <td >$row[phone_no]</td>
        </tr>
        ";
if(is_admin()){
echo "
        <tr>
        <td  width='25%'>Password</td>
        <td >$row[pass]</td>
        </tr>";    
}
}
echo "</table>";                
 if(file_exists("upload/$row[id].jpg"))
 {
echo    "<img src='upload/$row[id].jpg' width='470px' height='400px'/>";                
 }
$del_link= "";
if(is_admin()){
    $del_link = "<a href='tres_del.php?id=$row[id]'>Delete</a>";
    echo "
        <form method='post' enctype='multipart/form-data'>
        <p>Update Report : 
        <input type='file' name='at1'/>
        <input type='hidden' name = 'id' value='$_REQUEST[id]'/>
        <input type='submit' value='Update'>
        </form>
        ";
}
echo "<p >
<a href='tres_list.php'>Back</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
$del_link</p>"
                ?>                
<?php require_once 'footer.php'; ?>