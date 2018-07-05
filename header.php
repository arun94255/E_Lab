<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
ob_start();
session_start();
function e_hand($eno, $emsg){    
}
set_error_handler("e_hand");
require_once 'myfunc.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-LAB</title>
<meta name="keywords" content="E LAB, pathology, medical, test, blood test" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="templatemo_wrapper">
    <?php
    if(is_login()){
        echo "<p style='color:white; float: right;font-size: 16px;'>Welcome $_SESSION[uname] ";
        echo "</br><a style='color:#8888ff;' href='chpass.php'>Change Password</a></p>";
    }
    ?>
	<div id="templatemo_header">
    
    	<div id="site_title"><h1><a href="#"></a></h1></div>
        <div id="templatemo_menu">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li class="last"><a href="contact.php">Contact</a></li>
              <?php 
              if(is_login())
              {
                  if(is_admin()){
                  echo "<li><a href='reg.php'>Register Patient</a></li>";
                  }
                  echo "<li><a href='tres_list.php'>Test Result</a></li>";
                  echo "<li><a href='logout.php'>Logout</a></li>";
              }
              else{
                  echo "<li><a href='login.php'>Login</a></li>
                            ";
              }
              ?>
              
            </ul>
        </div> <!-- end of templatemo_menu -->
        <div id="templatemo_banner">
        	<span class="banner_text"></span>
        </div>
    	
    </div> <!-- end of header -->
    <div id="templatemo_left_sidebar">
    	<div class="sb_box">
          <div class="content_title"><span></span>Test</div>
            <ul class="tmo_list">
                <?php
                    $query = "select * from test_list order by rand() limit 10 ";
                    $r = run_sql($query);
                    while($row =mysql_fetch_array($r)){
                        echo "<li><a href='test_det.php?id=$row[id]'>$row[t_name]</a></li>";
                    }
                ?>
            </ul>
		</div>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
    </div> <!-- end of left sidebar -->
