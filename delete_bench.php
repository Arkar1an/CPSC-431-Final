<?php
require_once ('delete_funcs.php');
require_once ('Bench.php');
$b = $_POST['bench'];
$arr = explode(' ', $b);
delete_bench($arr[0],$arr[1]);
require ('delete_page.php');
?>
