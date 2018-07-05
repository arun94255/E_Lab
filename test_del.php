<?php
require_once 'header.php';
check_admin();
$query = "delete from test_list where id = $_REQUEST[id];";
$r = run_sql($query);
redirect("index.php?msg=2");
?>
