<?php
require_once 'const.php';
$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysql_error());

$query = "drop schema if exists `$db_name`";
$r = mysql_query($query, $con);
if(!$r){
    exit(mysql_error());
}
echo "DB Drop!!</br>";

$query = "CREATE SCHEMA `$db_name` ;";
$r = mysql_query($query, $con);
if(!$r){
    exit(mysql_error());
}
echo "DB Created!!</br>";

mysql_select_db("$db_name");

$query = "CREATE  TABLE `app_users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_name` VARCHAR(45) NULL ,
  `email` VARCHAR(100) NULL ,
  `pass` VARCHAR(45) NULL ,
  `phone_no` VARCHAR(45) NULL ,
  `t_name` VARCHAR(100) NULL ,
  `role` VARCHAR(45) NULL ,
  `status` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) );";
$r = mysql_query($query, $con);
if(!$r){
    exit(mysql_error());
}
echo "table Created!!</br>";

$query = "INSERT INTO  `app_users` 
    (`user_name`, `email`, `pass`, `role`, `status`, t_name) 
    VALUES ('admin', 'admin', 'admin', 'admin',  'approved', '');";
$r = mysql_query($query, $con);
if(!$r){
    exit(mysql_error());
}
echo "admin inserted!!</br>";

$query = "CREATE  TABLE `test_list` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `t_desc` TEXT NULL ,
  `t_name` VARCHAR(100) NULL ,
  `t_cate` VARCHAR(45) NULL ,
  `price` float NULL ,
  PRIMARY KEY (`id`) );";
$r = mysql_query($query, $con);
if(!$r){
    exit(mysql_error());
}
echo "table Created!!</br>";
$r = mysql_query("INSERT INTO  `test_list` (`t_name`, t_Cate, t_desc, price) values ('Maleria', 'Blood', 'Maleria Test', 200)", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO  `test_list` (`t_name`, t_Cate, t_desc, price) values ('Dengue', 'Blood', 'Dengue Test', 150)", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO  `test_list` (`t_name`, t_Cate, t_desc, price) values ('Sugar', 'Blood', 'Sugar Test', 100)", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO  `test_list` (`t_name`, t_Cate, t_desc, price) values ('D3', 'Blood', 'D3 Test', 1000)", $con) or exit(mysql_error());
?>
