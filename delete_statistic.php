<?php
require_once ('delete_funcs.php');
require_once ('Statistic.php');
$s = $_POST['stat'];
$arr = explode(' ', $s);
delete_statistic($arr[0],$arr[1],$arr[2],$arr[3]);
require ('delete_page.php');
?>