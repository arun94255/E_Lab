<?php
require_once 'header.php';
check_admin();
$query = "delete from app_users where id = $_REQUEST[id];";
$r = run_sql($query);
redirect("tres_list.php?msg=2");
?>
