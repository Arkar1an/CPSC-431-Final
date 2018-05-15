<?php
require_once ('delete_funcs.php');
require_once('Game.php');
$g = $_POST['game'];
$arr = explode(' ', $g);
delete_game($arr[0],$arr[1],$arr[2]);
require ('delete_page.php');
?>